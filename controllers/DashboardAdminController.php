<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;
use yii\filters\AccessControl;
use app\models\UserKosan;
use app\models\User;
use app\models\Kosan;
use app\models\KosanSearch;
use yii\data\Pagination;
use app\models\UserKosanSearch;


class DashboardAdminController extends \yii\web\Controller
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
       $dataProvider = $searchModel->kosanUserAll(Yii::$app->request->queryParams);
       return $this->render('user_kost', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);  
    }

    public function actionKonfirmasi($id)
    {
        $model  = UserKosan::findOne($id);
        $model->status_konfirmasi = 'Dikonfirmasi';
        if($model->save(false)){
           Yii::$app->session->setFlash('success', 'Pembayaran Berhasil Dikonfirmasi'); 
           return $this->redirect(['index']); 
        }
    }







}
