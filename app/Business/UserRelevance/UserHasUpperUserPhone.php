<?php


namespace App\Business\UserRelevance;


use App\User;

/**
 * Class UserHasUpperUser
 * @package App\Business\UserRelevance
 * @mixin User
 */
trait UserHasUpperUserPhone
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|UpperUserPhone[]
     */
    public function upperUserPhones()
    {
        return $this->hasMany(UpperUserPhone::class);
    }
}