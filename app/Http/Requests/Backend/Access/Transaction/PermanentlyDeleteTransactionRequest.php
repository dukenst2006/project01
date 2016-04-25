<?php

namespace App\Http\Requests\Backend\Access\Transaction;

use App\Http\Requests\Request;

/**
 * Class PermanentlyDeleteCustomerRequest
 * @package App\Http\Requests\Backend\Access\Customer
 */
class PermanentlyDeleteTransactionRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('permanently-delete-transactions');
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
