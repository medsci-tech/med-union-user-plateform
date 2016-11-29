<?php


namespace App\Http\Requests\ThirdPartyInterfaces;


use App\Business\Log\InterfaceLog;
use App\Http\Requests\Request;
use App\User;
use Auth;

class ApiRequest extends Request
{

    /**
     * @return User|null
     */
    public function getApiAuthedUser()
    {
        return Auth::guard('api')->user();
    }
}