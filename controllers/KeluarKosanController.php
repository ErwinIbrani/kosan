<?php

namespace app\controllers;

use app\models\Kosan;
use Yii;
use app\models\User;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * UserKosanController implements the CRUD actions for UserKosan model.
 */
class KeluarKosanController extends Controller
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

    public function actionKeluarKosan()
    {

           $model  = User::findOne(Yii::$app->user->identity->id);
           $model->delete();
           $kosan   = Kosan::findOne(1);
           Yii::$app->db->createCommand()
                ->update('kosan', ['jumlah_kamar' => $kosan->jumlah_kamar + 1], ['id' => $kosan->id])
                ->execute();
            Yii::$app->session->setFlash('success', 'Anda Telah Keluar Dari Kosan');
           return $this->redirect(['/landing-page/index']);
    }
    


   
}
