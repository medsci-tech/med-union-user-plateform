<?php

namespace App\Http\Requests\ThirdPartyInterfaces;
use App\Http\Requests\Request;
use App\User;

/**
 * Class RequestHasTargetUser
 * @mixin Request
 */
trait RequestHasTargetUser
{
    /**
     * @return User
     */
    public function getTargetUser()
    {
        return User::where('phone', $this->input('phone'))->firstOrFail();
    }
}