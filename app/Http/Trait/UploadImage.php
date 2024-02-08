<?php

namespace App\Http\Trait;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait UploadImage
{
    public static function upload($request, $model, $fileName, $folder)
    {

        if ($request->file($fileName)) {
            $old_path = $model->$fileName;
            File::delete(public_path($old_path));
            $file = $request->file($fileName);
            $filename = Str::uuid().$file->getClientOriginalName();
            $s = $file->move(public_path($folder), $filename);

            $path = $folder.'/'.$filename;
            $model->update([$fileName => $path]);
        }

    }
}
