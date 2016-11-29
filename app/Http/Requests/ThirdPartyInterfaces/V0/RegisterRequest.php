<?php

namespace App\Http\Requests\ThirdPartyInterfaces\V0;

use App\Events\InterfaceCalled\Register;
use App\Exceptions\BeansNotEnoughForProjectException;
use App\Http\Requests\ThirdPartyInterfaces\ApiRequest;
use App\User;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->getApiAuthedUser() && $this->getApiAuthedUser()->can('call interfaces');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //TODO
        return [
            'phone' => 'required|unique:users',
            'openid' => 'unique:users',
            'unionid' => 'unique:users',
            'email' => 'unique:users'
        ];
    }
}
