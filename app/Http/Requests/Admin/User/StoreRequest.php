<?php

namespace App\Http\Requests\Admin\User;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле "Имя" обязательно для заполнение.',
            'email.required' => 'Поле "Почта" обязательно для заполнение.',
            'email.email' => 'Поле электронной почты должно быть действительным адресом электронной почты.',
            'password.required' => 'Поле "Пароль" обязательно для заполнение.',
            'password.confirmed' => 'Поле подтверждения пароля не совпадает.',
        ];
    }
}
