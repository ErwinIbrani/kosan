<?php
namespace app\models\identity;

use yii\base\Model;
use Yii;
use app\models\identity\User;
use yii\helpers\Html;
/**
 * Signup form
 */
class SignupForm extends Model
{
    public $id;
    public $nama_lengkap;
    public $jenis_kelamin;
    public $tanggal_lahir;
    public $tempat_lahir;
    public $no_telepon;
    public $password;
    public $alamat;
    public $poto_ktp;
    public $username;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            ['nama_lengkap', 'trim'],
            ['nama_lengkap', 'required'],
            ['nama_lengkap', 'string', 'max' => 255],
            ['nama_lengkap','unique', 'targetClass' => '\app\models\identity\User', 'message' => 'Nama Lenkap Jangan sama, kalau sama gunakan alias'],
            
            ['jenis_kelamin', 'trim'],
            ['jenis_kelamin', 'required'],

            ['tanggal_lahir', 'trim'],
            ['tanggal_lahir', 'required'],

            ['tempat_lahir', 'trim'],
            ['tempat_lahir', 'required'],
            ['tempat_lahir', 'string', 'max' => 100],


            ['username','trim'],
            ['username','required'],
            ['username', 'string'],
            ['username','unique', 'targetClass' => '\app\models\identity\User', 'message' => 'Username Sudah Terdaptar'],
            
            ['no_telepon','trim'],
            ['no_telepon','required'],
            ['no_telepon', 'integer'],
            ['no_telepon','unique', 'targetClass' => '\app\models\identity\User', 'message' => 'Nomer HP Sudah Terdaptar'],

            ['alamat', 'trim'],
            ['alamat', 'required'],

            [['poto_ktp'], 'file', 'skipOnEmpty' => false, 'extensions' => ['jpg', 'gif', 'png', 'bmp']],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function sendVerification($id)
    {
        $user = User::findOne([
            'id' => $id,
        ]);

        return Yii::$app
            ->mailer
            ->compose()
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Konfirmasi Register Kosan' . Yii::$app->name)
            ->setTextBody("Mohon Untuk Klik Link")
            ->setHtmlBody(Html::a('Klik Untuk Konfirmasi',Yii::$app->urlManager->createAbsoluteUrl(['auth/confirmation', 'id' => $user->id, 'auth_key' => $user->auth_key])))
            ->send();
    }

}