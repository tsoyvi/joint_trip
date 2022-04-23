<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RussianCities extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('russian-cities.json');
        $json = json_decode($json, true);
        for ($i = 0; $i<count($json); $i++) {
            DB::table('russian_cities')->insert($this->getData($json[$i]));
        }
    }

    public function getData($json)
    {
        $data = [
            'name' => $json['name'],
            'subject' => $json['subject'],
            'district' => $json['district'],
            'coords_lat' => $json['coords']['lat'],
            'coords_lon' => $json['coords']['lon'],
            'population' => $json['population'],

        ];
        return $data;
    }
}
