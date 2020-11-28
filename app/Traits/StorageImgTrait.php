<?php

namespace App\Traits;

//use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Storage;

trait StorageImgTrait
{
    public function storageTraitUpload($request, $fileName, $folderName)
    {
        if ($request->hasFile($fileName)) {

            $file = $request->$fileName;
            $fileNameOrigin  = $file->getClientOriginalName();
            $filePath = $request->file($fileName)->storeAs('public/' . $folderName . '/' . auth()->id(), $fileNameOrigin);

            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath)
            ];
            return $dataUploadTrait;
        }
        return null;
    }
    //upload multiple
    public function storageTraitUploadMutiple($file, $folderName)
    {

        $fileNameOrigin  = $file->getClientOriginalName();
        $filePath = $file->storeAs('public/' . $folderName . '/' . auth()->id(), $fileNameOrigin);

        $dataUploadTrait = [
            'file_name' => $fileNameOrigin,
            'file_path' => Storage::url($filePath)
        ];
        return $dataUploadTrait;
    }
}
