<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $nama_lengkap
 * @property string $jenis_kelamin
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property string $alamat
 * @property string $poto_ktp
 * @property string $tanggal_lahir
 * @property string $tempat_lahir
 * @property string $no_telepon
 */
class User extends \yii\db\ActiveRecord
{

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
            [['nama_lengkap', 'jenis_kelamin', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'status', 'alamat', 'tanggal_lahir', 'tempat_lahir', 'no_telepon'], 'required'],
            [['jenis_kelamin', 'alamat', 'poto_ktp'], 'string'],
            [['status'], 'integer'],
            [['tanggal_lahir', 'tanggal_daftar'], 'safe'],
            [['nama_lengkap', 'password_hash', 'password_reset_token', 'username'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['email', 'tempat_lahir'], 'string', 'max' => 100],
            [['no_telepon'], 'string', 'max' => 15],
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
            'username'      => 'Username',
            'jenis_kelamin' => 'Jenis Kelamin',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'alamat' => 'Alamat',
            'poto_ktp' => 'Poto Ktp',
            'tanggal_lahir' => 'Tanggal Lahir',
            'tempat_lahir' => 'Tempat Lahir',
            'no_telepon' => 'No Telepon',
        ];
    }
}