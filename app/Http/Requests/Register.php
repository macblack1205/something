<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'first' => 'required|string|max:255',
            'last' => 'required|string|max:255',
            'email' => 'required|string|unique:users,email|max:255',
            'password' => 'required|string|min:4|confirmed',
            'password_confirmation' => 'required|same:password',
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
