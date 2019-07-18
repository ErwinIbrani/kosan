<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sarat_ketentuan".
 *
 * @property int $id
 * @property string $syarat
 * @property string $ketentuan
 */
class SaratKetentuan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sarat_ketentuan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ketentuan', 'syarat'], 'required'],
            [['id'], 'integer'],
            [['ketentuan'], 'string'],
            [['syarat'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'syarat' => 'Sarat',
            'ketentuan' => 'Ketentuan',
        ];
    }
}
