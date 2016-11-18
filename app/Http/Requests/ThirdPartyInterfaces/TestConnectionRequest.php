<?php

namespace App\Http\Requests\ThirdPartyInterfaces;

use Illuminate\Foundation\Http\FormRequest;

class TestConnectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->can('call interfaces');
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
