<?php

namespace App\Http\Requests\Admin\Charger;

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
            'address' => 'required',
            'coordinates' => 'required',
            'power' => 'required|numeric',
            'price' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле "Название" обязательно для заполнение.',
            'address.required' => 'Поле "Название" обязательно для заполнение.',
            'coordinates.required' => 'Поле "Название" обязательно для заполнение.',
            'power.required' => 'Поле "Название" обязательно для заполнение.',
            'power.numeric' => 'Поле цены должно быть числом.',
            'price.required' => 'Поле "Название" обязательно для заполнение.',
            'price.numeric' => 'Поле цены должно быть числом.',
        ];
    }
}
