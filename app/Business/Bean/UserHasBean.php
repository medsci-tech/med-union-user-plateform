<?php


namespace App\Business\Bean;


use App\Business\Log\BeanLog;
use App\Exceptions\BeansNotEnoughForProjectException;
use App\Exceptions\BeansNotEnoughForUserException;
use App\User;

/**
 * Class UserHasBean
 * @package App\Business\Bean
 * @mixin User
 */
trait UserHasBean
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne|Bean
     */
    public function bean()
    {
        return $this->hasOne(Bean::class);
    }

    /**
     * @param \App\Business\Bean\BeanRate $beanRate 迈豆规则
     * @param float                       $multiplicand 迈豆被乘数，通常是用户通过接口传入的
     * @return $this
     */
    public function modifyBeanAccordingToBeanRate(BeanRate $beanRate, float $multiplicand = 1.0)
    {
        \DB::transaction(function () use ($beanRate, $multiplicand) {
            \DB::table('beans')->lockForUpdate();
            \DB::table('projects')->lockForUpdate();

            $amount = $beanRate->rate * $multiplicand;

            $fresh = $this->bean()->first()->fresh();
            $user_beans_before = $fresh->number;
            if ($user_beans_before + $amount < 0) {
                throw new BeansNotEnoughForUserException();
            }
            $fresh->update([
                'number' => $fresh->number + $amount
            ]);
            $user_beans_after = $fresh->number;

            $fresh_project = $beanRate->project->fresh();
            $projcet_beans_before = $fresh_project->rest_of_beans;
            if ($projcet_beans_before < $amount) {
                throw new BeansNotEnoughForProjectException();
            }

            $fresh_project->rest_of_beans = $fresh_project->rest_of_beans - $amount;//Can't do mass assignment here!
            $fresh_project->save();

            $project_beans_after = $fresh_project->rest_of_beans;

            BeanLog::create([
                'user_id' => $this->id,
                'bean_rate_id' => $beanRate->id,
                'user_beans_before' => $user_beans_before,
                'user_beans_after' => $user_beans_after,
                'project_beans_before' => $projcet_beans_before,
                'project_beans_after' => $project_beans_after
            ]);
        });

        return $this;
    }
}