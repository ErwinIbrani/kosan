<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserKosan;
use app\models\UserKosanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
/**
 * UserKosanController implements the CRUD actions for UserKosan model.
 */
class UserKosanController extends Controller
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

    /**
     * Lists all UserKosan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserKosanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserKosan model.
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
     * Creates a new UserKosan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserKosan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UserKosan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UserKosan model.
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
     * Finds the UserKosan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserKosan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserKosan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionBayar($id)
    {
        $this->view->title = 'Upload Bukti PembayaranController Kosan';
        $transaction = Yii::$app->db->beginTransaction();
        $model    = $this->findModel($id);

     try {
          if ($model->load(Yii::$app->request->post()))
          {

              if (!file_exists($model->linkpreview))
               {

                 $folder = Yii::getAlias('@webroot/').Yii::getAlias('@buktipembayaran/');
                 $file   = UploadedFile::getInstance($model, 'bukti_pembayaran_virtual');
                 if (!is_null($file)) {
                      $filename                  = sha1(date('YmdHis').time());
                      $mfile                     = Yii::$app->mfile->upload($file, $folder, $filename);
                      if ($mfile) {
                        $model->bukti_pembayaran = $mfile;
                        $model->status_bayar     = 'Dibayar';
                      }
                 }
              }

              if($model->save(false)){
                  $newRecord                   = new UserKosan();
                  $newRecord->user_id          = $model->user_id;
                  $newRecord->kosan_id         = $model->kosan_id;
                  $newRecord->tgl_masuk_kos    = $model->tgl_berakhir_kos;
                  $newRecord->tgl_berakhir_kos = date("Y-m-d", strtotime(''.$newRecord->tgl_masuk_kos.' +1 month'));
                  $newRecord->periode_kosan    = $model->periode_kosan + 1;
                  $newRecord->status_cron_job  = 'Belum Dieksekusi';
                  if($newRecord->save(false)){
                    $transaction->commit();
                    Yii::$app->session->setFlash('success', 'Bukti Berhasil Diupload');
                    return $this->redirect(['/dashboard/index']);
                  }else{
                    $transaction->rollback();
                    Yii::$app->session->setFlash('error', 'Updated Failed');
                    return $this->redirect(['/dashboard/index']);
                  }
               }else{
                  $transaction->rollback();
                  Yii::$app->session->setFlash('error', 'Updated Failed');
                  return $this->redirect(['/dashboard/index']);
               }
             }

        } catch (\Exception $e) {
          $transaction->rollBack();
          throw $e;
      }

     return $this->render('_form_bayar', [
            'model' => $model,
        ]);
    }

    public  function  actionUser($kosan_id)
    {
        $query = UserKosan::find()
            ->select(['user.nama_lengkap', 'user.username', 'kosan.nama_kosan', 'user_kosan.user_id'])
            ->joinWith('kosan', true)
            ->joinWith('user', true)
            ->where(['user_kosan.kosan_id' => $kosan_id])
            ->groupBy(['user_kosan.user_id'])
            ->all();

        return $this->render('user', [
            'queryModels' =>  $query ,
        ]);
    }

    public function actionDate($today)
    {
        $query = UserKosan::find()
            ->select(['user.nama_lengkap', 'user.username', 'kosan.nama_kosan', 'user_kosan.user_id'])
            ->joinWith('kosan', true)
            ->joinWith('user', true)
            ->where(['user_kosan.tgl_berakhir_kos' => $today])
            ->groupBy(['user_kosan.user_id'])
            ->all();

        return $this->render('today', [
            'queryModels' =>  $query ,
        ]);

    }



}
