<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveHospitalRequest extends FormRequest
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
                    'hospital_id' => ['required', 'numeric', 'unique:hospitals,hospital_id'],
                    'hospital_code' => ['required', 'string', 'max:3'],
                    'hospital_name' => ['nullable', 'string', 'max:50'],
                    'region' => ['nullable', 'numeric'],
                    'address' => ['nullable', 'string', 'max:60'],
                    'telephone' => ['nullable', 'string', 'max:25', 'unique:hospitals,telephone'],
                    'fax' => ['nullable', 'string', 'max:25', 'unique:hospitals,fax'],
                    'email' => ['nullable', 'string', 'max:30', 'unique:hospitals,email'],
                    'wo_prefix' => ['nullable', 'string', 'max:6'],
                    'wocm_slno' => ['nullable', 'numeric'],
                    'wopm_slno' => ['nullable', 'numeric'],
                    'hospital_code_prefix' => ['nullable', 'numeric']
                ];
            }
            case 'PUT':
            {
                return [
                    'hospital_id' => ['required', 'numeric',
                        Rule::unique('hospitals', 'hospital_id')->ignore($this->route('hospital')->hospital_id, 'hospital_id')
                    ],
                    'hospital_code' => ['required', 'string', 'max:3'],
                    'hospital_name' => ['nullable', 'string', 'max:50'],
                    'region' => ['nullable', 'numeric'],
                    'address' => ['nullable', 'string', 'max:60'],
                    'telephone' => ['nullable', 'string', 'max:25',
                        Rule::unique('hospitals', 'telephone')->ignore($this->route('hospital')->hospital_id, 'hospital_id')
                    ],
                    'fax' => ['nullable', 'string', 'max:25',
                        Rule::unique('hospitals', 'fax')->ignore($this->route('hospital')->hospital_id, 'hospital_id')
                    ],
                    'email' => ['nullable', 'string', 'max:30',
                        Rule::unique('hospitals', 'email')->ignore($this->route('hospital')->hospital_id, 'hospital_id')
                    ],
                    'wo_prefix' => ['nullable', 'string', 'max:6'],
                    'wocm_slno' => ['nullable', 'numeric'],
                    'wopm_slno' => ['nullable', 'numeric'],
                    'hospital_code_prefix' => ['nullable', 'numeric']
                ];
            }
            default: break;
        }
    }
}
