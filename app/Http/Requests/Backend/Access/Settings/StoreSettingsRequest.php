<?php

namespace App\Http\Requests\Backend\Access\Settings;

use App\Http\Requests\Request;

/**
 * Class StoreSettingsRequest
 * @package App\Http\Requests\Backend\Access\Settings
 */
class StoreSettingsRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('edit-settings');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
//            'us_rate'                => 'required',
//            'euro_rate'              => 'required',
//            'peso_rate'              => 'required',
//            'app_name'               => 'required',
//            'canadian_rate'          => 'required',
//            'app_name'               => 'required',
        ];
    }
}
