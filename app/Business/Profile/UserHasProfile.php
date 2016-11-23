<?php


namespace App\Business\Profile;


use App\User;

/**
 * Class UserHasProfile
 * @package App\Business\Profile
 * @mixin User
 */
trait UserHasProfile
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne|Profile
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}