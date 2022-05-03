<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'id' => [''],
            'name' => ['required', 'string', 'max:255'],
            'surname' => [''],
            'patronymic' => [''],
            'email' => ['required', 'string', 'email'],
            'birth_day' => [''],
            'city' => [''],
            'phone_number' => [''],
            'messengers' => [''],
            'about_me' => [''],
            // 'password' => ['string'],
        ];


    }

    public function messages()
    {
        return [
            'required' => 'Заполните поле :attribute'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'ФИО пользователя',
            'login' => 'Логин',
            'password' => 'Пароль',

        ];
    }
}