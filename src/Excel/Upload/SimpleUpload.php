<?php
namespace Src\Excel\Upload;

use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;

class SimpleUpload{

    protected static $allowExts = ['xlsx','xls','ppt','pptx','doc','docx','jpeg','jpg','png','webp','gif'];

    public static function validateExts(UploadedFile $file,array $allowExts = []){

        if(!$allowExts){
            self::$allowExts = $allowExts;
        }

        if(in_array($file->getClientOriginalExtension(),self::$allowExts)){
            return new Response([
                'error' => '文件后缀不允许'
            ]);
        }

        return $file;
    }

}