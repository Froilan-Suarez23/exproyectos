<?php

namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model {

    public $excelFile;

    public function rules(){
        return [
            [['excelFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'csv', 'checkExtensionByMimeType' => false,],
        ];
    }

    public function upload(){
        if ($this->validate()){ 
            if(!file_exists('uploads/'. $this->excelFile->name)){

                if($this->excelFile->saveAs('uploads/' . $this->excelFile->name))
                    return true;
                else
                    return false;

            }else
                return false;
        } else
            return false;
    }

}