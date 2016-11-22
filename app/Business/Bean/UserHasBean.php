<?php


namespace App\Business\Bean;


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

    public function addBean(float $amount)
    {
        \DB::transaction(function () use ($amount) {
            \DB::table('beans')->lockForUpdate();
            $fresh = $this->bean()->fresh();
            $fresh->update([
                'number' => $fresh->number + $amount
            ]);
        });

        return $this;
    }

    public function minusBean(float $amount)
    {
        \DB::transaction(function () use ($amount) {
            \DB::table('beans')->lockForUpdate();
            $fresh = $this->bean()->fresh();
            if ($fresh->number < $amount) {
                throw new BeansNotEnoughForUserException();
            }
            $fresh->update([
                'number' => $fresh->number - $amount
            ]);
        });

        return $this;
    }
}