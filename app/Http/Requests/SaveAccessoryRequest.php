<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveAccessoryRequest extends FormRequest
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
                    'asset_tag_id' => ['required', 'numeric', 'unique:accessories,asset_tag_id'],
                    'asset_tag' => ['required', 'string', 'max:20'],
                    'asset_name' => ['required', 'string', 'max:25'],
                    'asset_disacription' => ['nullable', 'string', 'max:25'],
                    'asset_model' => ['nullable', 'string', 'max:25'],
                    'asset_serial' => ['nullable', 'string', 'max:25'],
                    'asset_manufacture' => ['nullable', 'string', 'max:25'],
                ];
            }
            case 'PUT':
            {
                return [
                    'asset_tag_id' => ['required', 'numeric',
                        Rule::unique('accessories', 'asset_tag_id')->ignore($this->route('accessory')->asset_tag_id, 'asset_tag_id')
                    ],
                    'asset_tag' => ['required', 'string', 'max:20'],
                    'asset_name' => ['required', 'string', 'max:25'],
                    'asset_disacription' => ['nullable', 'string', 'max:25'],
                    'asset_model' => ['nullable', 'string', 'max:25'],
                    'asset_serial' => ['nullable', 'string', 'max:25'],
                    'asset_manufacture' => ['nullable', 'string', 'max:25'],
                ];
            }
            default: break;
        }
    }
}
