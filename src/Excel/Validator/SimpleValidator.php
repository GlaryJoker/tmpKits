<?php
namespace Src\Excel\Validator;

use Illuminate\Support\Facades\Validator;

class SimpleValidator {

    /**
     * 验证头部
     * @author MengXiaocheng
     */
    public static function header($data,array $rules = []){

        return Validator::make($data,$rules);
    }

    /**
     * 验证body
     * @author MengXiaocheng
     */
    public static function body($data,array $rules = []){

        return Validator::make($data,$rules);
    }
}