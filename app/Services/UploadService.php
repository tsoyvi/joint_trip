<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserCar;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UploadService
{
    public function saveFile(UploadedFile $file, string $path): string
    {
        $status = $file->storeAs($path, $file->hashName(), 'public');
        if (!$status) {
            throw new \Exception("File wasn't upload");
        }
        return $status;
    }

    public function deleteFile(string $path)
    {
        // Удаляем старую картинку с сервера
        $status = null;
        if ($path) {
            $status = Storage::disk('public')->delete($path);
        }

        return $status;
    }

    /**Загрузка изображения пользователя.
     *  
     * */
    public function uploadUserAvatarImage($image, $userId)
    {
        try {
            $user =  User::find($userId);
            $imageLink = $this->saveFile($image, 'images/' . $userId);

            // Удаляем старую картинку с сервера
            if ($user->image_link) {
                $this->deleteFile($user->image_link);
            }

            // Добавляем ссылку на картинку в БД
            // $user->query()->update(['image_link' => $imageLink])->where('id', $userId);
            $user->image_link = $imageLink;
            $user->save();

            $status = true;
        } catch (\Illuminate\Database\QueryException $ex) {
            $status = false;
            $error = $ex->getMessage();
        }

        return $status;
    }

    /** Загрузка изображения автомобиля пользователя.
     *  
     * */
    public function uploadUserCarImage($image, $userCarId)
    {
        try {
            $userCar =  UserCar::find($userCarId);
            $imageLink = $this->saveFile($image, 'images/' . $userCarId);

            // Удаляем старую картинку с сервера
            if ($userCar->image_link) {
                $this->deleteFile($userCar->image_link);
            }

            // Добавляем ссылку на картинку в БД
            $userCar->query()->update(['image_link' => $imageLink]);

            $status = true;
        } catch (\Illuminate\Database\QueryException $ex) {
            $status = false;
            $error = $ex->getMessage();
        }

        return $status;
    }
}
