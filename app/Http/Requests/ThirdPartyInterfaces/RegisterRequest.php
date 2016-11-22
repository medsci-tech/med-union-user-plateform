<?php

namespace App\Http\Requests\ThirdPartyInterfaces;

use App\Events\InterfaceCalled\Register;
use App\Exceptions\BeansNotEnoughForProjectException;
use App\User;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * @var User|null
     */
    public $created_user;

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

    public function handle()
    {
        try {
            event(new Register($this));

            return response()->json([
                'status' => 'ok',
                'user_id' => $this->created_user->id
            ]);
        } catch (BeansNotEnoughForProjectException $e) {
            return response()->json([
                'status' => 'warning',
                'user_id' => $this->created_user->id,
                'message' => $e->getMessage()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => '未知错误，请联系管理员'
            ], 500);
        }
    }
}
