<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveAssetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'asset_id' => ['required', 'numeric', 'unique:assets,asset_id'],
                    'hospital_id' => ['required'],
                    'department_id' => ['required'],
                    'location_id' => ['required'],
                    'manufacturer_id' => ['required'],
                    'vendor_id' => ['required'],
                    'brand' => ['required', 'string', 'max:30' ],
                    'model' => ['required', 'string', 'max:30' ],
                    'serial_no' => ['required', 'string', 'max:30'],
                    'purchase_date' => ['required', 'date'],
                    'warranty_period' => ['required', 'string', 'max:30'],
                    'warranty_end' => ['required', 'date'],
                    'warranty_status' => ['required', 'string', 'max:30'],
                    'cost' => ['required', 'between:0,99.99'],
                    'variation' => ['required', 'string', 'max:30'],
                    'contract' => ['required', 'string', 'max:30'],
                    'asset_condition' => ['required', 'string', 'max:30'],
                    'remarks' => ['required', 'string', 'max:30'],
                    'description' => ['required', 'string', 'max:30'],
                ];
            }
            case 'PUT':
            {
                return [
                    'asset_id' => ['required', 'numeric',
                        Rule::unique('assets', 'asset_id')->ignore($this->route('asset')->asset_id, 'asset_id')
                    ],
                    'hospital_id' => ['required'],
                    'department_id' => ['required'],
                    'location_id' => ['required'],
                    'manufacturer_id' => ['required'],
                    'vendor_id' => ['required'],
                    'brand' => ['required', 'string', 'max:30' ],
                    'model' => ['required', 'string', 'max:30' ],
                    'serial_no' => ['required', 'string', 'max:30'],
                    'purchase_date' => ['required', 'date'],
                    'warranty_period' => ['required', 'string', 'max:30'],
                    'warranty_end' => ['required', 'date'],
                    'warranty_status' => ['required', 'string', 'max:30'],
                    'cost' => ['required', 'between:0,99.99'],
                    'variation' => ['required', 'string', 'max:30'],
                    'contract' => ['required', 'string', 'max:30'],
                    'asset_condition' => ['required', 'string', 'max:30'],
                    'remarks' => ['required', 'string', 'max:30'],
                    /*'date_created' => ['required', 'date'],
                    'created_by' => ['required', 'string', 'max:30'],*/
                    'description' => ['required', 'string', 'max:30'],
                ];
            }
            default: break;
        }
    }
}
