<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CarModels extends Seeder
{
    /**
     * Run the database seeds.
     * Сидер заполняющий БД марками и моделями автомобилей
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('cars.json');
        $json = json_decode($json, true);
        $carList = $json['list'];
        
        foreach ($carList as $brand => $jsonModel) {
            DB::table('car_models')->insert( $this->getData($brand, $jsonModel) );
        }

    }

    public function getData($brand, $jsonModel)
    {
        $data = [
            'brand' => $brand,
            'models' => json_encode($jsonModel),
        ];
        return $data;
    }
}
