<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\RussianCities;
use Illuminate\Http\Request;

class СitiesListController extends Controller
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

            $citiesList =  RussianCities::select('name')
                ->orderBy('russian_cities.name')
                ->get();
            $success = true;
            $message = 'cities_list';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
            $inspectors_list = '';
        }
        return response()->json([
            "success" => $success,
            "message" => $message,
            "citiesList" => $citiesList,
        ]);
    }
}
