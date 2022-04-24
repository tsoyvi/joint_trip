<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarBodyType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->data();

        for ($i = 0; $i < count($data); $i++) {
            DB::table('car_body_type')->insert($this->getData($data[$i]));
        }
    }

    public function data()
    {
        $data = [
            'Автобус',
            'Бескапотный',
            'Брогам',
            'Внедорожник',
            'Кабриолет',
            'Комби',
            'Компактвэн',
            'Кроссовер',
            'Купе',
            'Ландо',
            'Лимузин',
            'Лифтбэк',
            'Микроавтобус',
            'Микровэн',
            'Минивен',
            'Пикап',
            'Родстер',
            'Седан',
            'Спайдер',
            'Стретч',
            'Тарга',
            'Таун-кар',
            'Универсал',
            'Фастбэк',
            'Фаэтон',
            'Фургон',
            'Хардтоп',
            'Хэтчбек',
            'Шутинг брейк',

        ];
        return $data;
    }

    public function getData($bodyType)
    {
        $data = [
            'body_type' => $bodyType,
        ];
        return $data;
    }
}
