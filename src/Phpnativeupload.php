<?php

namespace Phpnativeupload;

class Fileupload
{
    public static $temFile;
    public static $filePath;
    public static $fileName;
    public static $orgFileName;
    public static function upload($file, $path){
        static::$temFile = $file;
        static::$filePath = $path;
        return new static;
    }
    public function save(){
        $fileName = time() . uniqid() . '.' . static::$temFile->getClientOriginalExtension();
        static::$orgFileName = static::$temFile->getClientOriginalName();
        static::$fileName = $fileName;
        static::$temFile->move(public_path(static::$filePath), $fileName);
        return new static;
    }
    public function getFileName(){
        return static::$fileName;
    }
    public function getOrgFileName(){
        return static::$orgFileName;
    }
}
