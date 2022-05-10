<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Trips extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('trips.json');
        $json = json_decode($json, true);
        for ($i = 0; $i < count($json); $i++) {
            DB::table('trips')->insert($this->getData($json[$i]));
        }
    }

    public function getData($json)
    {
        $data = [
            'driver_id' => $json['driver_id'],
            'from' => $json['from'],
            'date_depart' => $json['date_depart'],
            'to' => $json['to'],
            'date_arrival' => $json['date_arrival'],
            'count_pass' => $json['count_pass'],
            'place_cost' => $json['place_cost'],
        ];
        return $data;
    }
}
