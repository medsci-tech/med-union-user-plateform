<?php

namespace App\Http\Requests\Business\Application;

use App\Http\Requests\Request;

class UpdateApplicationRequest extends Request
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
        $request_id = $this->get('request_validate_id');
        return [
            //
            'name' => 'required|max:255|unique:applications,name,' . $request_id,
            'name_en' => 'required|max:255|unique:applications,name_en,' . $request_id,
            'enterprise_id' => 'required',
        ];
    }
}
