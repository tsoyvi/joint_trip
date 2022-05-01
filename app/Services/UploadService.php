<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class UploadService
{
    public function saveFile(UploadedFile $file, string $puth): string
    {
        $status = $file->storeAs($puth, $file->hashName(), 'public');
        if(!$status) {
            throw new \Exception("File wasn't upload");
        }
        return $status;
    }
}
