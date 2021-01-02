<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveCategoryRequest extends FormRequest
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
                    'asset_category_id' => ['required', 'numeric', 'unique:asset_categories,asset_category_id'],
                    'ecri_code' => ['required', 'string', 'max:6'],
                    'asset_category' => ['required', 'string', 'max:75'],
                    'asset_definition' => ['required', 'string'],
                    'asset_type' => ['required', 'string', 'max:15'],
                    'classification' => ['required', 'string', 'max:15'],
                    'pm_hours' => ['required', 'numeric'],
                    'task_no' => ['required', 'string', 'max:10'],
                    'pm_frequency' => ['nullable', 'numeric'],
                    'fda_risk' => ['nullable', 'string', 'max:15'],
                    'proficiency_level' => ['required'],
                    'tools_required' => ['nullable', 'string'],
                    'safety_instructions' => ['nullable', 'string'],
                    'est_service_life' => ['nullable', 'string'],
                ];
            }
            case 'PUT':
            {
                return [
                    'asset_category_id' => ['required', 'numeric',
                        Rule::unique('asset_categories', 'asset_category_id')->ignore($this->route('category')->asset_category_id, 'asset_category_id')
                    ],
                    'ecri_code' => ['required', 'string', 'max:6'],
                    'asset_category' => ['required', 'string', 'max:75'],
                    'asset_definition' => ['required', 'string'],
                    'asset_type' => ['required', 'string', 'max:15'],
                    'classification' => ['required', 'string', 'max:15'],
                    'pm_hours' => ['required', 'numeric'],
                    'task_no' => ['required', 'string', 'max:10'],
                    'pm_frequency' => ['nullable', 'numeric'],
                    'fda_risk' => ['nullable', 'string', 'max:15'],
                    'proficiency_level' => ['required'],
                    'tools_required' => ['nullable', 'string'],
                    'safety_instructions' => ['nullable', 'string'],
                    'est_service_life' => ['nullable', 'string'],
                ];
            }
            default: break;
        }
    }
}
