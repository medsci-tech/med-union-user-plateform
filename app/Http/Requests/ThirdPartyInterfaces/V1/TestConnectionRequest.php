<?php

namespace App\Http\Requests\ThirdPartyInterfaces\V1;

use App\Http\Requests\ThirdPartyInterfaces\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class TestConnectionRequest extends ApiRequest
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
        return [
            //
        ];
    }

    public function handle()
    {
        return response()->json([
            'status' => 'ok',
            'message' => '接入成功！欢迎使用迈德api！'
        ]);
    }
}
