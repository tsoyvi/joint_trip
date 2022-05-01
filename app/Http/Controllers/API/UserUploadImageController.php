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
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * CreateRequest
     */
    public function userImage(Request $request)
    {
        // $validated = $request->validated();
        $user =  User::find($request['id']);

        if ($request->hasFile('image')) {
            $validated['image'] = app(UploadService::class)
                ->saveFile(
                    $request->file('image'),
                    'images/' . $user->id
                );
            // Удаляем старую картинку с сервера
            if ($user->image_link) {
                Storage::disk('public')->delete($user->image_link);
            }
            // Добавляем ссылку на картинку в БД
            $user->update(['image_link' => $validated['image']]);
            $success = true;
        } else {
            $success = false;
        }


        $response = [
            'success' => $success,
            // 'request' => $request['userId'], //$request['image'],

        ];
        sleep(2);
        return response()->json($response);
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * CreateRequest
     */
    public function userCarImage(Request $request)
    {
        // $validated = $request->validated();
        $userCar =  UserCar::find($request['id']);

        if ($request->hasFile('image')) {
            $validated['image'] = app(UploadService::class)
                ->saveFile(
                    $request->file('image'),
                    'images/' . $userCar->user_id
                );

            // Удаляем старую картинку с сервера
            if ($userCar->image_link) {
                Storage::disk('public')->delete($userCar->image_link);
            }
            // Добавляем ссылку на картинку в БД
            $userCar->update(['image_link' => $validated['image']]);
            $success = true;
        } else {
            $success = false;
        }


        $response = [
            'success' => $success,
            'request' => $userCar->image_link //$request['image'],

        ];
        sleep(2);
        return response()->json($response);
    }
}
