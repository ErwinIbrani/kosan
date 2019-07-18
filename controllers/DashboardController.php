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


class DashboardController extends \yii\web\Controller
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
      /*user sudah kost*/
      /*if(Yii::$app->user->identity->status_kost === 1){ */
      $kosanStatus = UserKosan::find()->where(['user_id' => Yii::$app->user->identity->id])->one();
      $searchModel = new UserKosanSearch();
      $dataProvider = $searchModel->kosanUser(Yii::$app->request->queryParams);
            return $this->render('index-search', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'kosanStatus' => $kosanStatus,
            ]);

        /*}*//*else{
            $searchModel = new KosanSearch();
            $query       = Kosan::find();
            $countQuery  = clone $query;
            $pages       = new Pagination(['totalCount' => $countQuery->count()]);
            $models      = $query->offset($pages->offset)->limit($pages->limit)->all();
            return $this->render('index', [
                                         'models' => $models,
                                         'pages' => $pages,
                                         'searchModel' => $searchModel]);
        }*/
     }


   public function actionSearch()
   {
       $this->view->title = 'Kosan';
       $model = new KosanSearch();
       if ($model->load(Yii::$app->request->post())){
         $request              = Yii::$app->request;
         $model->alamat_kosan  = $request->post('KosanSearch')['alamat_kosan'];
         if(!empty($model->alamat_kosan)){
             $query       = Kosan::find()
                            ->where(['like', 'alamat_kosan', '%' .$model->alamat_kosan. '%', false]);;
             $countQuery  = clone $query;
             $pages       = new Pagination(['totalCount' => $countQuery->count()]);
             $models      = $query->offset($pages->offset)->limit($pages->limit)->all();
             return $this->render('index', ['models' => $models,'pages' => $pages, 'searchModel' => $model]);
         }
         else{
            return $this->redirect(['index']); 
         }
      }      
   }



   /*public function actionKeluarKost($id)
   {
      $kosan                = Kosan::findOne($id);
      $kosan->jumlah_kamar  = $kosan->jumlah_kamar + 1;
      if($kosan->save(false)){
        $user = User::findOne(Yii::$app->user->identity->id);
        $user->delete();
        Yii::$app->session->setFlash('success', 'Anda Telah Mengakhiri Kosan'); 
        return $this->redirect(['/auth/login']); 
      }
   }*/

}
