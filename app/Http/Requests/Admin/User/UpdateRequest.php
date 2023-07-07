<?php

namespace App\Http\Requests\Admin\User;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable',
            'email' => 'nullable|email',
            'password' => 'nullable|confirmed|min:8',
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'Поле электронной почты должно быть действительным адресом электронной почты.',
            'password.confirmed' => 'Поле подтверждения пароля не совпадает.',
        ];
    }
}
