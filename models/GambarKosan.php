<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gambar_kosan".
 *
 * @property int $id
 * @property int $kosan_id
 * @property string $gambar
 */
class GambarKosan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gambar_kosan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'kosan_id'], 'integer'],
            [['gambar'], 'string'],
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
            'kosan_id' => 'Kosan ID',
            'gambar' => 'Gambar',
        ];
    }

    public function getKosan()
    {
        return $this->hasOne(Kosan::className(), ['id' => 'kosan_id']);
    }

}
