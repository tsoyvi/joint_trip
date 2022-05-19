<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserCar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserCarController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, UserCar $userCar)
    {
        try {

            $userCar = UserCar::updateOrCreate(
                ['user_id' => $request['user_id']], // по чему ищем
                [
                    'brand' => $request['brand'], // что обновляем / вставляем
                    'model' => $request['model'],
                    'capacity' => $request['capacity'],
                    'color' => $request['color'],
                    'body_type' => $request['body_type'],
                    'engine_capacity' => $request['engine_capacity'],
                    'issue_year' => $request['issue_year'],
                    'state_number' => $request['state_number'],
                ]
            );

            $success = true;
            $message = 'Запись обновлена';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
            $userCar = '';
        }

        return response()->json([
            "success" => $success,
            "message" => $message,
            "data" => $userCar,
        ]);
    }
}
