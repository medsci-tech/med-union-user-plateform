<?php

namespace App\Http\Requests\ThirdPartyInterfaces;

use App\Events\InterfaceCalled\Register;
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
            'phone' => 'required'
        ];
    }

    public function handle()
    {
        try {
            event(new Register($this));
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error'
            ], 500);
        }
        return response()->json([
            'status' => 'ok'
        ]);
    }
}
