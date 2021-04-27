<?php

namespace App;

trait Utils
{
    public function fileUpload($req, $imageName, $destination)
    {
        if (!$req->hasFile($imageName)) return null;

        $file = $req->file($imageName);

        $originalName = $file->getClientOriginalName();
        $originalName = pathinfo($originalName, PATHINFO_FILENAME);
        $name = strtolower(str_replace(' ', '-', $originalName));
        $extension = $file->extension();
        $fileName = $name . "-" . uniqid() . "." . $extension;

        $path = $file->storeAs($destination, $fileName);

        return $path;
    }
}
