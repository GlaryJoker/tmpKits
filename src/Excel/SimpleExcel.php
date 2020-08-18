<?php
namespace Src\Excel;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Src\Excel\Validator\SimpleValidator;

/**
 * 第一步 验证Excel字段
 * 第二步 验证
 *
 * Class Excel
 * @package Src\Excel
 * @author MengXiaocheng
 */

class SimpleExcel{

    protected $defaultOptions = [];

    protected $options = [];

    protected $file = '';

    /**
     *
     * SimpleExcel constructor.
     * @param string $file 全路径文件
     * @param array $options 配置参数
     */
    public function __construct(UploadedFile $file,array $options = [])
    {
        $this->file = $file;

        $this->defaultOptions = [
            //表头验证参数
            'header_rules' => [],
            //表内容验证参数
            'body_rules' => [],
            //表内容所对应的字段
            'fields_map' => [],
            //保存的地址,
            'save_path' => "",
            //保存文件处理函数
            "save_file_process" => null
        ];

        $this->options = array_merge($this->defaultOptions,$options);

    }

    /**
     * 执行
     * @author MengXiaocheng
     */
    public function exec(){

        if($validator = $this->validate() instanceof Validator){
            return $validator;
        }



    }

    protected function validate(){
        if($this->options['header_rules']){
            $validateHeader = SimpleValidator::header($this->data,$this->options['header_rules']);
            if($validateHeader->fails()){
                return $validateHeader;
            }
        }

        if($this->options['body_rules']){
            $validateBody = SimpleValidator::body($this->data,$this->options['body_rules']);
            if($validateBody->fails()){
                return $validateBody;
            }
        }

        return $this;
    }



}