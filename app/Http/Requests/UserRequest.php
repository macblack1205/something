<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'first' => 'required|string|max:255',
            'last' => 'required|string|max:255',
            'email' => ['required','string','email','max:255',
                Rule::unique('users')->ignore($this->user()->id),
            ],
            'password' => 'nullable|string|min:4|confirmed',
            'password_confirmation' => 'nullable|same:password',
        ];
    }

    public function messages()
    {
        return [
            'first.required' => 'Field cannot be left empty!',
            'last.required' => 'Field cannot be left empty!',
            'email.required' => 'Field cannot be left empty!',
            'email.unique' => 'User with this email exists!',
            'password.min' => 'Length must be minimum 4 characters!',
            'password.required' => 'Field cannot be left empty!',
            'password.confirmed' => 'Try different password!',
            'password_confirmation.same' => 'Password does not match!',
            'password_confirmation.required' => 'Field cannot be left empty!',
        ];
    }
}
