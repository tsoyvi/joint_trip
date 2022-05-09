<?php

namespace App\Http\Requests\Trips;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'driver_id' => ['numeric'],
            'from' => ['string'],
            'date_depart' => ['date'],
            'to' => ['string'],
            'date_arrival' => ['date'],
            'count_pass' => ['numeric'],
            'place_cost' => ['numeric'],


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
            // 'login' => 'Логин',
            'password' => 'Пароль',

        ];
    }
}
