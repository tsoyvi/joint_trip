<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;
// use Illuminate\Database\Eloquent\Builder;

class SearchTripsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        try {

            $arrWhere = [];
            // Формируем часть SQL запроса 
            if ($request['from'] != null) {
                $arrWhere[] = ['from', 'like', $request['from']];
            }
            if ($request['to'] != null) {
                $arrWhere[] = ['to', 'like', $request['to']];
            }

            if ($request['date'] != null) {
                $arrWhere[] = ['date_depart', '>=', date("Y-m-d", strtotime($request['date']))];
            }

            if ($request['count_pass'] != null) {
                $arrWhere[] = ['count_pass', '>=', $request['count_pass']];
            }

            // делаем запрос к БД
            $trips = Trip::with('user_driver')
                ->where($arrWhere)
                ->get();

            $success = true;
            $message = 'Список найденных поездок';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
            $trips = '';
        }
        return response()->json([
            "success" => $success,
            "message" => $message,
            "trips" => $trips,
        ]);
    }
}
