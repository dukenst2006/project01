<?php

namespace App\Http\Requests\Backend\Access\Customer;

use App\Http\Requests\Request;

/**
 * Class EditCustomerRequest
 * @package App\Http\Requests\Backend\Access\Customer
 */
class EditCustomerRequest extends Request
{
    /**
     * Determine if the Customer is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('edit-customers');
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
