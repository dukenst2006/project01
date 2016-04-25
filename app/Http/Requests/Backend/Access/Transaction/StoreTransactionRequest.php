<?php

namespace App\Http\Requests\Backend\Access\Transaction;

use App\Http\Requests\Request;

/**
 * Class StoreUserRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class StoreTransactionRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
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
            'number'                => 'required',
            'name'                  => 'required',
            'lastname'              => 'required',
            'address'               => 'required',
            'phone'                 => 'required',
            'email'                 => 'required|email|unique:customers',
        ];
    }
}
