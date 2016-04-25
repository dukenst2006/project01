<?php

namespace App\Http\Requests\Backend\Access\Transaction;

use App\Http\Requests\Request;

/**
 * Class DeleteCustomerRequest
 * @package App\Http\Requests\Backend\Access\Customer
 */
class DeleteTransactionRequest extends Request
{
    /**
     * Determine if the Customer is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('delete-transactions');
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
