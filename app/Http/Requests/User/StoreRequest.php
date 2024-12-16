<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required|unique:users',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:8',
            // 'level' => 'required',
            // 'birthday' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please fill your name.',
            'name.unique' => 'Your name is exist',
            'email.required' => 'Please fill your email.',
            'email.unique' => 'Your email is exist',
            'password.required' => 'Please fill your password.',
            'password.confirmed' => 'Confirmation password doen\'n match.',
            'password.min' => 'Password must be at least 8 chars.',
            // 'level.required' => 'Please choose your level.',
            // 'birthday.required' => 'Please choose your birthday.',
        ];
    }
}
