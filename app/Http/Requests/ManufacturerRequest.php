<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ManufacturerRequest extends FormRequest
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
        return [
            'manufacturer_id' => [
                'required',
                'numeric',
                Rule::unique('manufacturers', 'manufacturer_id')
            ],
            'manufacturer_code' => ['required', 'numeric'],
            'manufacturer_name' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u'],
            'contact_person' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'state_or_province' => ['required', 'string'],
            'postal_code' => ['required', 'string'],
            'country' => ['required', 'string'],
            'phone_number' => [
                'required',
                'string',
                'max:20',
                Rule::unique('manufacturers', 'phone_number')
            ],
            'fax_number' => [
                'required',
                'string',
                'max:20',
                Rule::unique('manufacturers', 'fax_number')
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:100',
                Rule::unique('manufacturers', 'email'),
            ],
        ];
    }
}
