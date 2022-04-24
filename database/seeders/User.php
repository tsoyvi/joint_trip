<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('users.json');
        $json = json_decode($json, true);

        for ($i = 0; $i < count($json); $i++) {
            DB::table('users')->insert($this->getData($json[$i]));
        }
    }

    public function getData($array)
    {
        $data = [
            "login" => $array["login"],
            "name" => $array["name"],
            "surname" => $array["surname"],
            "patronymic" => $array["patronymic"],
            "birth_day" => $array["birth_day"],
            "city" => $array["city"],
            "phone_number" => $array["phone_number"],
            "messengers" => json_encode($array["messengers"]),
            "email" => $array["email"],
            "password" => Hash::make($array["password"]),
            "role" => $array["role"],
        ];

        return $data;
    }
}
