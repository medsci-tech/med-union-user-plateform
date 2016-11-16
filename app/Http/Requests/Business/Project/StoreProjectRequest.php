<?php

namespace App\Http\Requests\Business\Project;

use App\Http\Requests\Request;

class StoreProjectRequest extends Request
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
            'name' => 'required|unique:projects|max:255',
            'name_en' => 'required|unique:projects|max:255',
            'application_id' => 'required',
        ];
    }
}
