<?php


namespace App\Business\Bean;


use App\Business\Log\BeanLog;
use App\Events\Statistics\BeanActivity;
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
    public function modifyBeanAccordingToBeanRate($beanRate, $multiplicand = 1.0)
    {
        \DB::transaction(function () use ($beanRate, $multiplicand) {
            \DB::table('beans')->lockForUpdate();
            \DB::table('projects')->lockForUpdate();

            $amount = $beanRate->rate * $multiplicand;
            $user_beans_before = $this->bean_number;//call the getter
            if ($user_beans_before + $amount < 0) {
                throw new BeansNotEnoughForUserException();
            }
            $this->bean_number = $user_beans_before + $amount;//call the setter

            $user_beans_after = $this->bean_number;
            $fresh_project = $beanRate->project->fresh();
            $projcet_beans_before = $fresh_project->rest_of_beans;
            if ($projcet_beans_before - $amount < -1000000000) {
                throw new BeansNotEnoughForProjectException();
            }

            $fresh_project->rest_of_beans = $fresh_project->rest_of_beans - $amount;//Can't do mass assignment here!
            $fresh_project->save();

            $project_beans_after = $fresh_project->rest_of_beans;

            $bean_log = BeanLog::create([
                'user_id' => $this->id,
                'bean_rate_id' => $beanRate->id,
                'user_beans_before' => $user_beans_before,
                'user_beans_after' => $user_beans_after,
                'project_beans_before' => $projcet_beans_before,
                'project_beans_after' => $project_beans_after
            ]);

            event(new BeanActivity($bean_log));
        });

        return $this;
    }

    public function getBeanNumberAttribute()
    {
        //always use the dynamic query
        if ($this->bean()->first() == null) {
            $this->bean()->save(
                new Bean([
                    'number' => 0
                ])
            );
        }

        return $this->bean()->first()->number;
    }

    public function setBeanNumberAttribute($number)
    {
        if ($this->bean()->first() == null) {
            $this->bean()->save(
                new Bean([
                    'number' => $number
                ])
            );
        } else {
            $this->bean()->first()->update([
                'number' => $number
            ]);
        }
    }
}