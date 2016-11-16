<?php

namespace App\Http\Requests\Business\Project;

use App\Http\Requests\Request;

class UpdateProjectRequest extends Request
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
            'name' => 'required|max:255|unique:projects,name,' . $request_id,
            'name_en' => 'required|max:255|unique:projects,name_en,' . $request_id,
            'application_id' => 'required',
        ];
    }
}
