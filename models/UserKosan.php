<?php

namespace app\models;

use Yii;
use app\models\User;
use yii\helpers\Url;
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

    public $bukti_pembayaran_virtual;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'kosan_id', 'tgl_masuk_kos', 'tgl_berakhir_kos'], 'required'],
            [['bayar', 'nunggak', 'total'], 'number'],
            [['user_id', 'kosan_id', 'periode_kosan'], 'integer'],
            [['tgl_masuk_kos', 'tgl_berakhir_kos', 'jenis_pembayaran'], 'safe'],
            [['status', 'status_bayar', 'status_konfirmasi', 'bukti_pembayaran', 'status_cron_job'], 'string'],
            [['kosan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kosan::className(), 'targetAttribute' => ['kosan_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['bukti_pembayaran_virtual'], 'file', 'skipOnEmpty' => false, 'extensions' => ['jpg', 'gif', 'png', 'bmp']],
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
            'status_konfirmasi' => 'Status Konfirmasi',
            'bukti_pembayaran' => 'Bukti PembayaranController',
            'status_cron_job'  => 'Cron Job',
            'jenis_pembayaran' =>'Jenis Pembayaran',
            'bayar'            => 'Bayar',
            'nunggak'          => 'Nunggak',
            'total'            => 'Total'
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


    public function getLinkpreview()
    {
        $code = Yii::$app->mfile->getCode($this->bukti_pembayaran,Yii::getAlias('@webroot/').Yii::getAlias('@buktipembayaran/'));
        if(!is_null($this->bukti_pembayaran) AND !empty($this->bukti_pembayaran))
            return Url::to(['/site/image', 'code' => $code]);
        else
            return Yii::getAlias('@web').'/uploads/default.png';
    }

    public static function kirim_pemberitahuan($date)
    {
        $target   = self::find()
                  ->where(['tgl_masuk_kos' => $date])
                  ->andWhere(['!=', 'periode_kosan', 1])
                  ->all();
     
        if(!empty($target)) {
           foreach ($target as $model) {
             $model->status_cron_job = 'Dieksekusi';
             self::kirim_email($model->user_id);
             return $model->save(false);
           }
        }
        else{
            return $target;
        }   
    }


     public static function kirim_email($user_id)
    {
        $users = User::find()
                ->where(['id' => $user_id])
                ->all();
         foreach ($users as $user) {
         echo "Sedang Mengirim Pemberitahuan.......";
         Yii::$app->mailer->compose()
                 ->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->name.'robot'])
                 ->setTo($user->email)
                 ->setSubject('Kosan Anda Akan Segera Berakhir, Mohon Untuk Segera Membayar/Memperpanjang Kosan')
                 ->send();
        }
    }

    
}
