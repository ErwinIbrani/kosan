<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;
use app\models\UserKosan;
use app\models\UserKosanSearch;

class PembayaranSuperadminController extends Controller
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
        $dataProvider = $searchModel->kosanUserAlls(Yii::$app->request->queryParams);
        return $this->render('user_kost', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionNot()
    {
        $searchModel = new UserKosanSearch();
        $dataProvider = $searchModel->kosanNots(Yii::$app->request->queryParams);
        return $this->render('user_kost_not', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionKonfirmasi($id)
    {
        $model = UserKosan::findOne($id);
        $model->status_konfirmasi = 'Dikonfirmasi';
        if ($model->save(false)) {
            Yii::$app->session->setFlash('success', 'PembayaranController Berhasil Dikonfirmasi');
            return $this->redirect(['index']);
        }
    }
}