<?php

namespace App\Http\Requests\ThirdPartyInterfaces\V1;

use App\Http\Requests\ThirdPartyInterfaces\ApiRequest;
use App\Http\Requests\ThirdPartyInterfaces\RequestHasTargetUser;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class ConsumeRequest extends ApiRequest
{
    use RequestHasTargetUser;

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
            'phone' => 'required|exists:users',
            'cash_paid_by_beans' => 'required|numeric|between:0,10000',
            'cash_paid' => 'required|numeric|between:0,10000',
            'is_first_cash_consume' => 'boolean'
        ];
    }

    public function getCashPaidByBeans()
    {
        return $this->input('cash_paid_by_beans', 0);
    }

    public function getCashPaid()
    {
        return $this->input('cash_paid', 0);
    }
}
