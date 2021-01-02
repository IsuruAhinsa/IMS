<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveManufacturerRequest extends FormRequest
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
                    'manufacturer_id' => ['required', 'numeric', 'unique:manufacturers,manufacturer_id'],
                    'manufacturer_code' => ['required', 'numeric', 'max:50'],
                    'manufacturer_name' => ['required', 'string', 'max:200'],
                    'contact_person' => ['required', 'string', 'max:30'],
                    'address' => ['nullable', 'string', 'max:50'],
                    'city' => ['nullable', 'string', 'max:25'],
                    'state_or_province' => ['nullable', 'string', 'max:25'],
                    'postal_code' => ['nullable', 'string', 'max:15'],
                    'country' => ['nullable', 'string', 'max:30'],
                    'phone_number' => ['required', 'string', 'max:20', 'unique:manufacturers,phone_number'],
                    'fax_number' => ['required', 'string', 'max:20', 'unique:manufacturers,fax_number'],
                    'email' => ['required', 'string', 'email', 'max:30', 'unique:manufacturers,email',],
                ];
            }
            case 'PUT':
            {
                return [
                    'manufacturer_id' => ['required', 'numeric',
                        Rule::unique('manufacturers', 'manufacturer_id')->ignore($this->route('manufacturer')->manufacturer_id, 'manufacturer_id')
                    ],
                    'manufacturer_code' => ['required', 'numeric', 'max:50'],
                    'manufacturer_name' => ['required', 'string', 'max:200'],
                    'contact_person' => ['required', 'string', 'max:30'],
                    'address' => ['nullable', 'string', 'max:50'],
                    'city' => ['nullable', 'string', 'max:25'],
                    'state_or_province' => ['nullable', 'string', 'max:25'],
                    'postal_code' => ['nullable', 'string', 'max:15'],
                    'country' => ['nullable', 'string', 'max:30'],
                    'phone_number' => ['required', 'string', 'max:20',
                        Rule::unique('manufacturers', 'phone_number')->ignore($this->route('manufacturer')->manufacturer_id, 'manufacturer_id')
                    ],
                    'fax_number' => ['required', 'string', 'max:20',
                        Rule::unique('manufacturers', 'fax_number')->ignore($this->route('manufacturer')->manufacturer_id, 'manufacturer_id')
                    ],
                    'email' => ['required', 'string', 'email', 'max:30',
                        Rule::unique('manufacturers', 'email')->ignore($this->route('manufacturer')->manufacturer_id, 'manufacturer_id')
                    ],
                ];
            }
            default: break;
        }
    }
}
