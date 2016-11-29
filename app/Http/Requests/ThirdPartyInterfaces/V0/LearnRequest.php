<?php

namespace App\Http\Requests\ThirdPartyInterfaces\V0;

use App\Http\Requests\ThirdPartyInterfaces\ApiRequest;
use App\Http\Requests\ThirdPartyInterfaces\RequestHasTargetUser;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class LearnRequest extends ApiRequest
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
            'phone' => 'exists:users'
        ];
    }
}
