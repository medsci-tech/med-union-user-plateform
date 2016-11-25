<?php

namespace App\Http\Requests\ThirdPartyInterfaces\V1;

use App\Http\Requests\ThirdPartyInterfaces\RequestHasResultSet;
use App\Http\Requests\ThirdPartyInterfaces\RequestHasTargetUser;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class QueryUserInformationRequest extends FormRequest
{
    use RequestHasTargetUser;
    use RequestHasResultSet;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can('call interfaces');
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
}
