<?php

namespace App\Http\Requests;

use App\Rules\DuplicatePrimaryKey;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveLocationRequest extends FormRequest
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
                    'location_id' => ['required', 'numeric', 'unique:locations,location_id'],
                    'location_code' => ['required', 'string', 'max:10'],
                    'description' => ['nullable', 'string', 'max:30'],
                ];
            }
            case 'PUT':
            {
                return [
                    'location_id' => ['required', 'numeric',
                        Rule::unique('locations', 'location_id')->ignore($this->route('location')->location_id, 'location_id')
                    ],
                    'location_code' => ['required', 'string', 'max:10'],
                    'description' => ['required', 'string', 'max:30'],
                ];
            }
            default: break;
        }
    }
}
