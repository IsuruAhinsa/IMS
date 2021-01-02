<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveVendorRequest extends FormRequest
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
                    'vendor_id' => ['required', 'numeric', 'unique:vendors,vendor_id'],
                    'vendor_code' => ['required', 'numeric', 'max:20'],
                    'supplier_name' => ['required', 'string', 'max:50'],
                    'contact_person' => ['required', 'string', 'max:30'],
                    'address' => ['nullable', 'string', 'max:50'],
                    'city' => ['nullable', 'string', 'max:25'],
                    'state_or_province' => ['nullable', 'string', 'max:25'],
                    'postal_code' => ['nullable', 'string', 'max:15'],
                    'country' => ['nullable', 'string', 'max:30'],
                    'phone_number' => ['required', 'string', 'max:20', 'unique:vendors,phone_number'],
                    'fax_number' => ['required', 'string', 'max:20', 'unique:vendors,fax_number'],
                    'email' => ['required', 'string', 'email', 'max:30', 'unique:vendors,email',],
                ];
            }
            case 'PUT':
            {
                return [
                    'vendor_id' => ['required', 'numeric',
                        Rule::unique('vendors', 'vendor_id')->ignore($this->route('vendor')->vendor_id, 'vendor_id')
                    ],
                    'vendor_code' => ['required', 'numeric', 'max:20'],
                    'supplier_name' => ['required', 'string', 'max:50'],
                    'contact_person' => ['required', 'string', 'max:30'],
                    'address' => ['nullable', 'string', 'max:50'],
                    'city' => ['nullable', 'string', 'max:25'],
                    'state_or_province' => ['nullable', 'string', 'max:25'],
                    'postal_code' => ['nullable', 'string', 'max:15'],
                    'country' => ['nullable', 'string', 'max:30'],
                    'phone_number' => ['required', 'string', 'max:20',
                        Rule::unique('vendors', 'phone_number')->ignore($this->route('vendor')->vendor_id, 'vendor_id')
                    ],
                    'fax_number' => ['required', 'string', 'max:20',
                        Rule::unique('vendors', 'fax_number')->ignore($this->route('vendor')->vendor_id, 'vendor_id')
                    ],
                    'email' => ['required', 'string', 'email', 'max:30',
                        Rule::unique('vendors', 'email')->ignore($this->route('vendor')->vendor_id, 'vendor_id')
                    ],
                ];
            }
            default: break;
        }
    }
}
