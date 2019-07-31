<?php

namespace app\controllers;

use app\models\GambarKosan;
use app\models\User;
use yii\web\Controller;
use app\models\Kosan;
use app\models\KosanSearch;
use yii\data\Pagination;
use Yii;
use app\models\UserKosan;

class LandingPageController extends Controller
{

  public $layout = 'main-login';

  public function actionIndex()
  {
  	 $this->view->title = 'Semua Kategori Kosan';
  	 $searchModel = new KosanSearch();
     $query       = GambarKosan::find()->innerJoinWith('kosan');
     $countQuery  = clone $query;
     $pages       = new Pagination(['totalCount' => $countQuery->count()]);
     $models      = $query->offset($pages->offset)->limit($pages->limit)->all();
     return $this->render('index', ['models' => $models,'pages' => $pages, 'searchModel' => $searchModel]);
   }


   public function actionSearch()
   {
   	   $this->view->title = 'Semua Kategori Kosan';
       $model = new KosanSearch();
	   if ($model->load(Yii::$app->request->post())){
	     $request              = Yii::$app->request;
	     $model->alamat_kosan  = $request->post('KosanSearch')['alamat_kosan'];
	     if(!empty($model->alamat_kosan)){
		     $query       = GambarKosan::find()->innerJoinWith('kosan')
		                    ->where(['like', 'kosan.alamat_kosan', '%' .$model->alamat_kosan. '%', false]);
	         $countQuery  = clone $query;
	         $pages       = new Pagination(['totalCount' => $countQuery->count()]);
	         $models      = $query->offset($pages->offset)->limit($pages->limit)->all();
		     return $this->render('index_filter', ['models' => $models,'pages' => $pages]);
		 }
		 else
         {
            return $this->redirect(['index']); 
		 }
    }      
  }


   public function actionDetail($id)
   {
       $this->view->title = 'Detail Kosan';
   	   $model     = Kosan::findOne($id);
       $userKosan = UserKosan::find()->where(['kosan_id' => $model->id])->count();
       return $this->render('detail', ['model' => $model, 'countkost' => $userKosan]);
   }


}