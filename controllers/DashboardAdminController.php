<?php

namespace app\controllers;

use app\models\Pengaduan;
use app\models\UserKosan;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Kosan;



class DashboardAdminController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    $this->redirect(['/auth/login']);
                }
            ],
        ];
    }

   public function actionIndex()
   {
       $kosan    = Kosan::find()->one();

       $userkost = UserKosan::find()
                        ->where(['kosan_id' => $kosan->id])
                        ->groupBy(['user_id'])
                        ->count();

       $jumlahBayar = UserKosan::find()
                       ->where(['kosan_id' => $kosan->id])
                       ->andWhere(['tgl_berakhir_kos' => date("Y-m-d")])
                       ->count();

       $blmKonfirmasi = UserKosan::find()
           ->where(['kosan_id' => $kosan->id])
           ->andWhere(['status_konfirmasi' => 'Belum Dikonfirmasi'])
           ->andWhere(['user_kosan.status_bayar' => 'Dibayar'])
           ->count();

       $komplain = Pengaduan::find()
                   ->where(['status' => 'Belum Diperbaiki'])
                   ->count();


       return $this->render('index', [
           'kosanModel'    => $kosan,
           'userKostModel' => $userkost,
           'bayar'         => $jumlahBayar,
           'notkonfim'     => $blmKonfirmasi,
           'keluhan'       => $komplain,
       ]);
   }






}
