<?php

namespace app\controllers;

use app\models\Pengaduan;
use app\models\PengelolaKosan;
use app\models\UserKosan;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Kosan;
use yii\db\Query;



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
        $getPengelola  = PengelolaKosan::find()->where(['user_id' => \Yii::$app->user->identity->id])->one();
        $kosan         = Kosan::findOne($getPengelola->kosan_id);

        $userkost = (new Query())
            ->from('user_kosan')
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
            ->andWhere(['kosan_id' => $kosan->id])
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