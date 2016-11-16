<?php

namespace App\Http\Requests\Business\Contract;

use App\Http\Requests\Request;

class StoreContractRequest extends Request
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
            'name' => 'required|unique:enterprises|max:2',
            'name_en' => 'required|unique:enterprises|max:255',
            'project_id' => 'required',
            'amount_of_money' => 'required',
            'rate_of_beans' => 'required',
        ];
    }
}
