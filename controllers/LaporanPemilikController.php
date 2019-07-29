<?php

namespace app\controllers;

use app\models\Pengaduan;
use app\models\UserKosan;
use app\models\UserKosanSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Kosan;
use yii\db\Query;

class LaporanPemilikController extends Controller
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

       $searchModel = new UserKosanSearch();
       $dataProvider = $searchModel->laporan(\Yii::$app->request->queryParams);

       return $this->render('index', [
           'searchModel' => $searchModel,
           'dataProvider' => $dataProvider,
       ]);
   }



}
