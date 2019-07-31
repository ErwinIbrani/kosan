<?php

namespace app\models;

use yii\base\Model;

class UploadFile extends Model
{

    public $gambar_poto;

    public function rules()
    {
       return  [
            [['gambar_poto'], 'file', 'extensions' => 'jpg', 'mimeTypes' => 'image/jpeg', 'maxFiles' => 5, 'skipOnEmpty' => false]
        ];
    }

}