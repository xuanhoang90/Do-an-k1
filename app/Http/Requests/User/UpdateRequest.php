<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|unique:users,name,'.$this->id,
            'email' => 'required|unique:users,email,'.$this->id,
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
            'password.min' => 'Password must be at least 8 chars.',
            // 'level.required' => 'Please choose your level.',
            // 'birthday.required' => 'Please choose your birthday.',
        ];
    }
}
