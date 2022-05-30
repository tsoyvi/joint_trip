<?php

namespace App\Services;

use App\Models\Notice;

// use App\Models\User;
// use App\Models\UserCar;
// use Illuminate\Http\UploadedFile;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Storage;

class NoticeService
{
    public function addNotice($noticeText, $user_id)
    {
        $status = null;
        try {

            $data = [
                'user_id' => $user_id,
                'status' => 1,
                'notice' => $noticeText,
            ];
            $notice = Notice::create($data);

        } catch (\Illuminate\Database\QueryException $ex) {
            $notice = $ex->getMessage();
        }

        return $notice;
    }
}
