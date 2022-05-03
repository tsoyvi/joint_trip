<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UploadService;
use App\Http\Requests\UploadImage\CreateRequest;
use App\Models\User;
use App\Models\UserCar;
use Illuminate\Support\Facades\Storage;

class UserUploadImageController extends Controller
{
    /**
     * Загрузка изображения пользователя.
     *
     * @param  App\Http\Requests\UploadImage\CreateRequest  $request
     * @return \Illuminate\Http\Response
     * 
     */
    public function userImage(CreateRequest $request)
    {
        $success = null;
        $message = null;

        try {
            $validated = $request->validated();

            $userId =  $validated['id'];
            $uploadService = app(UploadService::class);

            $status = $uploadService->uploadUserAvatarImage($validated['image'],  $userId);

            if ($status == true) {
                $success = true;
                $message = 'Загружено изображение пользователя';
            } else {
                $success = false;
                $message = 'Ошибка загрузки файла на сервер';
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        $response = [
            'success' => $success,
            'message' => $message,
        ];
        sleep(2);
        return response()->json($response);
    }

    /**
     * Загрузка изображения автомобиля пользователя.
     *
     * @param App\Http\Requests\UploadImage\ CreateRequest  $request
     * @return \Illuminate\Http\Response
     * CreateRequest
     */
    public function userCarImage(CreateRequest $request)
    {
        $success = null;
        $message = null;
        try {
            $validated = $request->validated();

            $uploadService = app(UploadService::class);

            $userCarId =  $validated['id'];
            $status = $uploadService->uploadUserCarImage($validated['image'],  $userCarId);

            if ($status == true) {
                $success = true;
                $message = 'Загружено изображение автомобиля пользователя';
            } else {
                $success = false;
                $message = 'Ошибка загрузки файла на сервер';
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }


        $response = [
            'success' => $success,
            'message' =>  $message,
        ];

        sleep(2);
        return response()->json($response);
    }
}
