<?php

namespace App\Http\Requests\Backend\Access\Customer;

use App\Http\Requests\Request;

/**
 * Class MarkUserRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class MarkCustomerRequest extends Request
{
    /**
     * Determine if the Customer is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //Get the 'mark' id
        switch ((int) request()->segment(6)) {
            case 0:
                return access()->allow('deactivate-customers');
            break;

            case 1:
                return access()->allow('reactivate-customers');
            break;
        }

        return false;
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
