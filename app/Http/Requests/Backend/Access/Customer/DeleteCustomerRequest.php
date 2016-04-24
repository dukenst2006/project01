<?php

namespace App\Http\Requests\Backend\Access\Customer;

use App\Http\Requests\Request;

/**
 * Class DeleteCustomerRequest
 * @package App\Http\Requests\Backend\Access\Customer
 */
class DeleteCustomerRequest extends Request
{
    /**
     * Determine if the Customer is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('delete-customers');
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
