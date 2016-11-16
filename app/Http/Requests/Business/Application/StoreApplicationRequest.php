<?php

namespace App\Http\Requests\Business\Application;

use App\Http\Requests\Request;

class StoreApplicationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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
            'name' => 'required|unique:applications|max:255',
            'name_en' => 'required|unique:applications|max:255',
            'enterprise_id' => 'required',
        ];
    }
}
