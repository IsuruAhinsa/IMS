<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveContractorRequest extends FormRequest
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
                    'reference_id' => ['required', 'numeric', 'unique:contractors,reference_id'],
                    'reference_code' => ['required', 'string', 'unique:contractors,reference_code'],
                    'contract_status' => ['required'],
                    'contractor_no' => ['required', 'max:30'],
                    'contractor_name' => ['required', 'string', 'max:50'],
                    'start_date' => ['required', 'date'],
                    'end_date' => ['required', 'date'],
                    'type' => ['required', 'max:30'],
                    'contractor_value' => ['required', 'numeric'],
                ];
            }
            case 'PUT':
            {
                return [
                    'reference_id' => ['required', 'numeric',
                        Rule::unique('contractors', 'reference_id')->ignore($this->route('contractor')->reference_id, 'reference_id')
                    ],
                    'reference_code' => ['required', 'numeric',
                        Rule::unique('contractors', 'reference_code')->ignore($this->route('contractor')->reference_id, 'reference_id')
                    ],
                    'contract_status' => ['required'],
                    'contractor_no' => ['required', 'max:30'],
                    'contractor_name' => ['required', 'string', 'max:50'],
                    'start_date' => ['required', 'date'],
                    'end_date' => ['required', 'date'],
                    'type' => ['required', 'max:30'],
                    'contractor_value' => ['required', 'numeric'],
                ];
            }
            default: break;
        }
    }
}
