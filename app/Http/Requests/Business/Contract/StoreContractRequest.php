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
            'name' => 'required|max:255|unique:contracts',
            'name_en' => 'required|max:255|unique:contracts',
            'project_id' => 'required',
            'amount_of_money' => 'required',
            'rate_of_beans' => 'required',
        ];
    }
}
