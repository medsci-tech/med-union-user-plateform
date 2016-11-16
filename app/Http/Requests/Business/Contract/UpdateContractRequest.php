<?php

namespace App\Http\Requests\Business\Contract;

use App\Http\Requests\Request;

class UpdateContractRequest extends Request
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
            'name' => 'required|max:255|unique:contracts,name,' . $request_id,
            'name_en' => 'required|max:255|unique:contracts,name_en,' . $request_id,
            'project_id' => 'required',
            'amount_of_money' => 'required',
            'rate_of_beans' => 'required',
        ];
    }
}
