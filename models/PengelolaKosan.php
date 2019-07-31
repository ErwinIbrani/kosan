<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengelola_kosan".
 *
 * @property int $id
 * @property int $user_id
 * @property int $kosan_id
 */
class PengelolaKosan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengelola_kosan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'kosan_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'kosan_id' => 'Kosan ID',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getKosan()
    {
        return $this->hasOne(Kosan::className(), ['id' => 'kosan_id']);
    }


    public function pengelolaList()
    {
        return User::find()
            ->joinWith('assignments', true)
            ->select(['user.id', 'user.nama_lengkap as value'])
            ->where(['auth_assignment.item_name' => 'Bagian Pemeliharaan'])
            ->asArray()
            ->all();
    }

    public function kosanList()
    {
        return Kosan::find()
            ->select(['kosan.id', 'CONCAT(kosan.nama_kosan,\' - \',kosan.alamat_kosan) as value'])
            ->asArray()
            ->all();
    }


}
