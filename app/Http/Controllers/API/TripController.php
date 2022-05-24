<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Trips\CreateRequest;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $user = Auth::user();

            // делаем запрос к БД
            $trips = Trip::with(['user_passenger'])
                ->where('driver_id',  $user->id)
                ->get();

            $passenger = User::with(['userTripPassenger'])
                ->select('id')
                ->where('id',  $user->id)
                ->get();

            $success = true;
            $message = 'Список поездок пользователя';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
            $trips = '';
            $passenger = '';
        }
        return response()->json([
            "success" => $success,
            "message" => $message,
            "trips" => $trips,
            "passenger" => $passenger,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $success = null;
        $message = null;
        try {
            $validated = $request->validated();
            $user = Auth::user();
            $validated['driver_id'] = $user->id;

            $trip =  Trip::create($validated);
            $success = true;
            $message = 'Запись о поездке добавлена';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }
        $response = [
            'success' => $success,
            'message' =>  $message,
        ];

        // sleep(1);
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $trip)
    {
        try {
            $trip->delete();
            $success = true;
            $message = 'Поездка удалена';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }
        // response
        return response()->json([
            "success" => $success,
            "message" => $message,
        ]);
    }
}
