<?php

use App\Http\Controllers\API\ReservationSeatController;
use App\Http\Controllers\API\SearchTripsController;
use App\Http\Controllers\API\TripController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\СitiesListController;
use App\Http\Controllers\API\UserCarController;
use App\Http\Controllers\API\UserUploadImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/


Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::get('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');
Route::get('check_login', [UserController::class, 'checkLogin']);

//Route::put('update_user_data/{id}', [UserController::class, 'update']);// Обновление пользователя


Route::apiResource('update_user_data', UserController::class);
Route::put('update_user_car/{id}', [UserCarController::class, '__invoke']);

Route::get('cities_list', СitiesListController::class);

// Не забудьте создать символическую ссылку 
// php artisan storage:link
Route::post('upload_user_image', [UserUploadImageController::class, 'userImage']);
Route::post('upload_user_car_image', [UserUploadImageController::class, 'userCarImage']);

Route::apiResource('trip', TripController::class);

Route::post('search_trips', [SearchTripsController::class, '__invoke']); // поиск поездок
Route::post('reservation_seat', [ReservationSeatController::class, '__invoke']); // бронирование поездки
