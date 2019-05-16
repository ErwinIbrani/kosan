<?php

namespace app\models;

use yii\helpers\Url;
use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $nama_lengkap
 * @property string $username
 * @property string $jenis_kelamin
 * @property string $tanggal_lahir
 * @property string $tempat_lahir
 * @property string $no_telepon
 * @property string $auth_key
 * @property string $password_hash
 * @property string $email
 * @property int $status
 * @property string $alamat
 * @property string $poto_ktp
 * @property string $tanggal_daftar
 *
 * @property Komplain $komplain
 * @property UserKosan[] $userKosans
 */
class User extends \yii\db\ActiveRecord
{

    public $password;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_lengkap', 'username', 'jenis_kelamin', 'tanggal_lahir', 'tempat_lahir', 'no_telepon', 'auth_key', 'password_hash', 'email', 'status', 'alamat', 'tanggal_daftar'], 'required'],
            [['jenis_kelamin', 'alamat', 'poto_ktp'], 'string'],
            [['tanggal_lahir', 'tanggal_daftar'], 'safe'],
            [['status', 'status_kost'], 'integer'],
            [['nama_lengkap', 'username', 'password_hash', 'password'], 'string', 'max' => 255],
            [['tempat_lahir', 'email'], 'string', 'max' => 100],
            [['no_telepon'], 'string', 'max' => 15],
            [['auth_key'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_lengkap' => 'Nama Lengkap',
            'username' => 'Username',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tanggal_lahir' => 'Tanggal Lahir',
            'tempat_lahir' => 'Tempat Lahir',
            'no_telepon' => 'No Telepon',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'email' => 'Email',
            'status' => 'Status',
            'alamat' => 'Alamat',
            'poto_ktp' => 'Poto Ktp',
            'tanggal_daftar' => 'Tanggal Daftar',
            'status_kost' => 'Status Kost'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKomplain()
    {
        return $this->hasOne(Komplain::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserKosans()
    {
        return $this->hasMany(UserKosan::className(), ['user_id' => 'id']);
    }

    public function getLinkpreview()
    {
        $code = Yii::$app->mfile->getCode($this->poto_ktp,Yii::getAlias('@webroot/').Yii::getAlias('@potoktp/'));

        if(!is_null($this->poto_ktp) AND !empty($this->poto_ktp))
            return Url::to(['/site/image', 'code' => $code]);
        else
            return Yii::getAlias('@web').'/uploads/default.png';
    }

    public function getAssignments()
    {
        return $this->hasMany(AuthAssignment::className(), ['user_id' => 'id']);
    }
}