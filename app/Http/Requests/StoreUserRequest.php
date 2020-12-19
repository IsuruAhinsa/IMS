<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:100', 'min:2', 'regex:/^[a-zA-Z]+$/u'],
            'last_name' => ['required', 'string', 'max:100', 'min:2', 'regex:/^[a-zA-Z]+$/u'],
            'password' => [
                $this->method() == 'POST' ? 'required' : 'nullable',
                $this->method() == 'POST' ? 'min:8' : '',
                'confirmed'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:100',
                Rule::unique('users', 'email')->ignore(Auth::id()),
            ],
            'roles' => ['required'],
            'phone' => ['nullable', 'string'],
            'website' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'city' => ['nullable', 'string'],
            'state' => ['nullable', 'string'],
            'zip' => ['nullable', 'numeric'],
            'country' => ['nullable', 'string'],
            'notes' => ['nullable', 'string'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required' => 'Please enter first Name.',
            'first_name.regex' => 'Please enter valid first Name.',
            'last_name.required' => 'Please enter last Name.',
            'last_name.regex' => 'Please enter valid last Name.',
            'password.required' => 'Please enter password.',
            'password.min' => 'Password must be 8 or more characters in length.',
            'password.confirmed' => 'Password and confirmation password do not match. Try again!',
            'email.required' => 'Please enter email address.',
            'roles.required' => 'Please select at least one role for new user.',
            'zip.numeric' => 'Please enter valid zip code or postal code.',
        ];
    }
}
