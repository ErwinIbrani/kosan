<?php

namespace app\models;

use yii\helpers\Url;
use Yii;

/**
 * This is the model class for table "kosan".
 *
 * @property int $id
 * @property string $nama_kosan
 * @property int $jumlah_kamar
 * @property string $harga_perbulan
 * @property string $alamat_kosan
 * @property string $pasilitas
 * @property string $jenis_kosan
 * @property string $status
 * @property string $gambar_kosan
 *
 * @property Komplain[] $komplains
 * @property UserKosan[] $userKosans
 */
class Kosan extends \yii\db\ActiveRecord
{
    public $gambar_poto;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kosan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_kosan', 'jumlah_kamar', 'harga_perbulan', 'alamat_kosan', 'pasilitas', 'jenis_kosan'], 'required'],
            [['jumlah_kamar'], 'integer'],
            [['harga_perbulan'], 'number'],
            [['alamat_kosan', 'pasilitas', 'jenis_kosan', 'gambar_kosan'], 'string'],
            [['nama_kosan'], 'string', 'max' => 200],
            [['status'], 'string', 'max' => 100],
            [['gambar_poto'], 'file', 'skipOnEmpty' => false, 'on' => 'create', 'extensions' => ['jpg', 'gif', 'png', 'bmp']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_kosan' => 'Nama Kosan',
            'jumlah_kamar' => 'Jumlah Kamar',
            'harga_perbulan' => 'Harga Perbulan',
            'alamat_kosan' => 'Alamat Kosan',
            'pasilitas' => 'Fasilitas',
            'jenis_kosan' => 'Jenis Kosan',
            'status' => 'Status',
            'gambar_kosan' => 'Gambar Kosan',
            'gambar_poto' => 'Upload Gambar Kosan'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKomplains()
    {
        return $this->hasMany(Komplain::className(), ['kosan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserKosans()
    {
        return $this->hasMany(UserKosan::className(), ['kosan_id' => 'id']);
    }

     public function getLinkpreview()
    {
        $code = Yii::$app->mfile->getCode($this->gambar_kosan,Yii::getAlias('@webroot/').Yii::getAlias('@potokosan/'));

        if(!is_null($this->gambar_kosan) AND !empty($this->gambar_kosan))
            return Url::to(['/site/image', 'code' => $code]);
        else
            return Yii::getAlias('@web').'/uploads/default.png';
    }
}
