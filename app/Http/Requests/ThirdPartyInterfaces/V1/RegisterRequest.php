<?php

namespace App\Http\Requests\ThirdPartyInterfaces\V1;

use App\Events\InterfaceCalled\Register;
use App\Exceptions\BeansNotEnoughForProjectException;
use App\User;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //TODO UPDATE AUTHORIZATIONS AND AUTHENTICATIONS
        return Auth::user()->can('call interfaces');
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
