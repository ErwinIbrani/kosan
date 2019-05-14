<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_kosan".
 *
 * @property int $id
 * @property int $user_id
 * @property int $kosan_id
 * @property string $tgl_masuk_kos
 * @property string $tgl_berakhir_kos
 * @property string $status
 * @property string $status_bayar
 * @property string $pemebritahuan
 *
 * @property Kosan $kosan
 * @property User $user
 */
class UserKosan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_kosan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'kosan_id', 'tgl_masuk_kos', 'tgl_berakhir_kos'], 'required'],
            [['user_id', 'kosan_id', 'periode_kosan'], 'integer'],
            [['tgl_masuk_kos', 'tgl_berakhir_kos'], 'safe'],
            [['status', 'status_bayar', 'status_konfirmasi'], 'string'],
            [['kosan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kosan::className(), 'targetAttribute' => ['kosan_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'tgl_masuk_kos' => 'Tgl Masuk Kos',
            'tgl_berakhir_kos' => 'Tgl Berakhir Kos',
            'status' => 'Status',
            'status_bayar' => 'Status Bayar',
            'periode_kosan' => 'Periode Kosan',
            'status_konfirmasi' => 'Status Konfirmasi'
        ];

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKosan()
    {
        return $this->hasOne(Kosan::className(), ['id' => 'kosan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
