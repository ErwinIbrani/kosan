<?php

namespace app\models;

use Yii;
use app\models\Kosan;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\Url;
/**
 * This is the model class for table "pengaduan".
 *
 * @property int $id
 * @property int $user_id
 * @property int $kosan_id
 * @property string $jenis_pengaduan
 * @property string $keterangan_pengadu
 * @property string $foto
 * @property string $status
 * @property string $keterangan_teknisi
 * @property string $tanggal_laporan
 * @property string $tanggal_ditangani
 *
 * @property Kosan $kosan
 * @property User $user
 */
class Pengaduan extends \yii\db\ActiveRecord
{

    public $virtual;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengaduan';
    }

     public function behaviors()
    {
        return [
        // Other behaviors
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'tanggal_laporan',
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ],
        ];   
    }
    

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'jenis_pengaduan', 'keterangan_pengadu'], 'required'],
            [['user_id', 'kosan_id'], 'integer'],
            [['keterangan_pengadu', 'foto', 'status', 'keterangan_teknisi'], 'string'],
            [['tanggal_laporan'], 'safe'],
            [['jenis_pengaduan'], 'string', 'max' => 255],
            [['kosan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kosan::className(), 'targetAttribute' => ['kosan_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['virtual'], 'file', 'skipOnEmpty' => false, 'on' => 'create', 'extensions' => ['jpg', 'gif', 'png', 'bmp']],
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
            'jenis_pengaduan' => 'Jenis Pengaduan',
            'keterangan_pengadu' => 'Keterangan Pengadu',
            'foto' => 'Foto',
            'status' => 'Status',
            'keterangan_teknisi' => 'Keterangan Teknisi',
            'tanggal_laporan' => 'Tanggal Laporan'
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

    }


    public function getNamakosan()
    {
       return Kosan::find()
              ->select(['id', 'nama_kosan as value'])
              ->asArray()
              ->all();
    }


    public function beforeSave($insert)
    {
        if($this->isNewRecord) {
            $this->setAttribute('status', 'Belum Diperbaiki');
        } else {
            $this->setAttribute('status', 'Diperbaiki');
        }

        return parent::beforeSave($insert);
    }
}
