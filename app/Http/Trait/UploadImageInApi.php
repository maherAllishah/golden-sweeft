<?php

namespace App\Http\Trait;

use Illuminate\Support\Str;


trait UploadImageInApi
{
    public function upload($file, $folder)
    {

        $filename = Str::uuid() . $file->getClientOriginalName();
        $file->move(public_path($folder), $filename);
        $path = $folder . '/' . $filename;

        return $path;
    }
}
