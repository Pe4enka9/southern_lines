<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'login.required' => 'Поле логина обязательно для заполнения',
            'login.string' => 'Поле логина должно быть строкой',
            'password.required' => 'Поле пароля обязательно для заполнения',
            'password.string' => 'Поле пароля должно быть строкой',
        ];
    }
}
