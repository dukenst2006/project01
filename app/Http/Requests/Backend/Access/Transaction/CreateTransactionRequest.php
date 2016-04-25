<?php

namespace App\Http\Requests\Backend\Access\Transaction;

use App\Http\Requests\Request;

/**
 * Class CreateCustomerRequest
 * @package App\Http\Requests\Backend\Access\Customer
 */
class CreateTransactionRequest extends Request
{
    /**
     * Determine if the Customer is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('create-transactions');
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
