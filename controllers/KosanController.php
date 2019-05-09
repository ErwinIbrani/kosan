<?php

namespace app\controllers;

use Yii;
use app\models\Kosan;
use app\models\KosanSearch;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UserKosan;

/**
 * KosanController implements the CRUD actions for Kosan model.
 */
class KosanController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Kosan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KosanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kosan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Kosan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   
    public function actionCreate()
    {
     
      $model = new Kosan();
        if ($model->load(Yii::$app->request->post())){
            $request               = Yii::$app->request;
            $model->nama_kosan     = $request->post('Kosan')['nama_kosan'];
            $model->jumlah_kamar   = $request->post('Kosan')['jumlah_kamar'];
            $model->harga_perbulan = $request->post('Kosan')['harga_perbulan'];
            $model->alamat_kosan   = $request->post('Kosan')['alamat_kosan'];
            $model->pasilitas      = $request->post('Kosan')['pasilitas'];
            $model->jenis_kosan    = $request->post('Kosan')['jenis_kosan'];
            $folder                = Yii::getAlias('@webroot/').Yii::getAlias('@potokosan/');
            $file                  = UploadedFile::getInstance($model, 'gambar_poto');

             if (!is_null($file)) 
             {
                $filename = sha1(date('YmdHis').time());
                $mfile    = Yii::$app->mfile->upload($file, $folder, $filename);
               if ($mfile) {
                  $model->gambar_kosan = $mfile;
                 }
             }else{
               Yii::$app->session->setFlash('success', 'Mohon Untuk Upload Gambar'); 
               return $this->redirect(['create']); 
             }
           
            if($model->save(false)){
                Yii::$app->session->setFlash('success', 'Berhasil Disimpan'); 
                return $this->redirect(['index']); 
           }
           else{
             Yii::$app->session->setFlash('error', 'Ada yang error'); 
             return $this->redirect(['index']); 
           }
       }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Kosan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
     public function actionUpdate($id)
    {
      $model    = $this->findModel($id);
      $old_file = $model->gambar_kosan;

      if ($model->load(Yii::$app->request->post()))
      {
        
         $request               = Yii::$app->request;
         $model->nama_kosan     = $request->post('Kosan')['nama_kosan'];
         $model->jumlah_kamar   = $request->post('Kosan')['jumlah_kamar'];
         $model->harga_perbulan = $request->post('Kosan')['harga_perbulan'];
         $model->alamat_kosan   = $request->post('Kosan')['alamat_kosan'];
         $model->pasilitas      = $request->post('Kosan')['pasilitas'];
         $model->jenis_kosan    = $request->post('Kosan')['jenis_kosan'];

          if (file_exists($model->linkpreview))
          {
             $model->gambar_kosan = $old_file;
          }

          if (!file_exists($model->linkpreview))
           {
         
             $folder = Yii::getAlias('@webroot/').Yii::getAlias('@potokosan/');
             $file   = UploadedFile::getInstance($model, 'gambar_poto');
             if (!is_null($file)) 
                {
                   if(!empty($model->gambar_kosan)){
                    unlink(Yii::getAlias('@webroot/').Yii::getAlias('@potokosan/'.$model->gambar_kosan));
                    $filename      = sha1(date('YmdHis').time());
                    $mfile         = Yii::$app->mfile->upload($file, $folder, $filename);
                    if ($mfile) {
                      $model->gambar_kosan = $mfile;
                    }  
                }else{
                    $filename      = sha1(date('YmdHis').time());
                    $mfile         = Yii::$app->mfile->upload($file, $folder, $filename);
                    if ($mfile) {
                      $model->gambar_kosan = $mfile;
                    }
                }
              }
          }

          if($model->save()){
              Yii::$app->session->setFlash('success', 'Kosan Berhasil Diupdate'); 
              return $this->redirect(['index']);
           }else{
              Yii::$app->session->setFlash('error', 'Updated Failed'); 
              return $this->redirect(['index']);
           } 
         }  
            
        return $this->render('update', [
                'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Kosan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kosan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kosan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kosan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionListKosan()
    {
        $this->view->title = 'Semua Kategori Kosan';
        $searchModel = new KosanSearch();
        $query       = Kosan::find();
        $countQuery  = clone $query;
        $pages       = new Pagination(['totalCount' => $countQuery->count()]);
        $models      = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('list-kosan', ['models' => $models,'pages' => $pages, 'searchModel' => $searchModel]);
    }


   public function actionSearch()
   {
       $this->view->title = 'Semua Kategori Kosan';
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
             return $this->render('list_filter', ['models' => $models,'pages' => $pages]);
         }
         else{
            return $this->redirect(['list-kosan']); 
         }
      }      
   }

   public function actionCreateKosanUser()
   {
       $model = new UserKosan();
        if ($model->load(Yii::$app->request->post())){
            $request               = Yii::$app->request;
            $model->user_id        = Yii::$app->user->identity->id;
            $model->kosan_id       = $request->post('UserKosan')['kosan_id'];
            $model->tgl_masuk_kos  = $request->post('UserKosan')['tgl_masuk_kos'];
            $model->alamat_kosan   = $request->post('UserKosan')['alamat_kosan'];
            $model->pasilitas      = $request->post('UserKosan')['pasilitas'];
            $model->jenis_kosan    = $request->post('UserKosan')['jenis_kosan'];
            $ada = $this->cek($model->user_id, $model->kosan_id);
            if($ada > 1){
              Yii::$app->session->setFlash('error', 'Ada yang error'); 
              return $this->redirect(['index']); 
            }else{
                if($model->save()){
                    $user = User::findOne($model->user_id);
                    $user->status_kost = 1;
                    $user->save(false); 
                    Yii::$app->session->setFlash('error', 'Ada yang error'); 
                    return $this->redirect(['index']);  
                }
            }
        
        }  
   }

   private function cek($user_id, $kosan_id)
   {
      return UserKosan::find()
                 ->where(['user_id' => $user_id, 'kosan_id' => $kosan_id])
                 ->one();
   }

}