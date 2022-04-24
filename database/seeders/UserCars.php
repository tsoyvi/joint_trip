<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserCars extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = DB::table('users')
            ->select('id')
            ->get();


        foreach ($users as $user => $userData) {
            DB::table('user_cars')->insert( $this->getData($userData->id) );
            echo $this->stateNumber()  . ' / ';
        }
    }

    public function getData($id)
    {
        $carData = $this->getCarData();
        $data = [
            "user_id" => $id,
            "brand" => $carData['brand'],
            "model" => $carData['model'],
            "body_type" => $this->bodyType(),
            "issue_year" => $this->getIssueYear(),
            "color" => $this->getColorData(),
            "engine_capacity" => $this->engineCapacity(),
            "capacity" => $this->capacity(),
            "state_number" => $this->stateNumber(),
        ];

        return $data;
    }

    public function getCarData()
    {
        $json = Storage::disk('local')->get('cars.json');
        $json = json_decode($json, true);
        $carList = $json['list'];

        $brand =  array_keys($carList)[rand(1, count($carList)) - 1];
        $modelsList = $carList[$brand];
        $model = $modelsList[rand(1, count($modelsList)) - 1];

        $data = [
            'brand' => $brand,
            'model' => $model,
        ];
        return $data;
    }

    public function getColorData()
    {
        $data = [
            "Белый",
            "Черный",
            'Красный',
            'Желтый',
            'Зеленый',
            'Голубой',
            'Синий',
        ];

        return $data[rand(1, count($data)) - 1];
    }

    public function getIssueYear()
    {
        $year = rand(1980, 2022);
        return $year;
    }

    public function engineCapacity()
    {
        $engineCapacity = rand(10, 50) / 10;
        return $engineCapacity;
    }

    public function capacity()
    {
        $capacity = rand(2, 4);
        return $capacity;
    }

    public function bodyType()
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

        return $data[rand(1, count($data)) - 1];
    }

    public function stateNumber()
    {
        $array = array(
            'А',  'В',  'Е',  'К',  'М', 'Н', 'О', 'Р',
            'С', 'Т', 'У', 'Х'
        );

        $strStateNumber = $array[rand(1, count($array)) - 1] . ' ';
        $strStateNumber .= rand(0, 9);
        $strStateNumber .= rand(0, 9);
        $strStateNumber .= rand(0, 9). ' ';
        $strStateNumber .= $array[rand(1, count($array)) - 1];
        $strStateNumber .= $array[rand(1, count($array)) - 1]. ' ';
        $strStateNumber .= rand(0, 9);
        $strStateNumber .= rand(0, 9);
        $strStateNumber .= rand(0, 9);
        return $strStateNumber;
    }
}
