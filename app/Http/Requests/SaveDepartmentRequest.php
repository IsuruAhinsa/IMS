<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveDepartmentRequest extends FormRequest
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
                    'department_id' => ['required', 'numeric', 'unique:departments,department_id'],
                    'department_code' => ['required', 'string', 'max:10'],
                    'description' => ['required', 'string', 'max:50'],
                ];
            }
            case 'PUT':
            {
                return [
                    'department_id' => ['required', 'numeric',
                        Rule::unique('departments', 'department_id')->ignore($this->route('department')->department_id, 'department_id')
                    ],
                    'department_code' => ['required', 'string', 'max:10'],
                    'description' => ['required', 'string', 'max:50'],
                ];
            }
            default: break;
        }
    }
}
