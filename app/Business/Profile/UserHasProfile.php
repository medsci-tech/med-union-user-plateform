<?php


namespace App\Business\Profile;


trait UserHasProfile
{
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}