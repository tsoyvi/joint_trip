<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservationSeatController extends Controller
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
            $user = Auth::user();

            $input = $request->input();


            $data = [
                'user_id' => $user->id,
                'trip_id' => $input['id'],
                'place_count' => $input['seat_reservation'],
            ];

            $result = DB::table('trip_user')->insert($data);

            $success = true;
            $message = 'Места забронированы';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
            $result = '';
        }
        return response()->json([
            "success" => $success,
            "message" => $message,
            "reservation" => $result,
        ]);
    }
}
