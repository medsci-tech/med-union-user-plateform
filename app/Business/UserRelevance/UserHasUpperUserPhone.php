<?php


namespace App\Business\UserRelevance;


use App\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class UserHasUpperUser
 * @package App\Business\UserRelevance
 * @mixin User
 */
trait UserHasUpperUserPhone
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|Collection
     */
    public function upperUserPhones()
    {
        return $this->hasMany(UpperUserPhone::class);
    }

    /**
     * @return bool
     */
    public function hasUpperUser()
    {
        return !! $this->upperUserPhones()->count();
    }

    /**
     * @return User|null
     */
    public function upperUser()
    {
        return User::where('phone', $this->upperUserPhones()->first()->upper_user_phone)->first();
    }

    /**
     * @return \App\User|null
     */
    public function getUpperUserAttribute()
    {
        return $this->upperUser();
    }
}