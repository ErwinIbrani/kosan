<?php

namespace app\controllers;

use app\models\Kosan;
use Yii;
use app\models\Pengaduan;
use app\models\PengaduanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
/**
 * PengaduanController implements the CRUD actions for Pengaduan model.
 */
class PengaduanController extends Controller
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
     * Lists all Pengaduan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PengaduanSearch();
       
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    

    /**
     * Displays a single Pengaduan model.
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
     * Creates a new Pengaduan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate()
    {
     
      $model = new Pengaduan();
        if ($model->load(Yii::$app->request->post())){
            $request                   = Yii::$app->request;
            $model->user_id            = Yii::$app->user->identity->id;
            $kosan                     = Kosan::findOne(1);
            $model->kosan_id           = $kosan->id;
            $model->jenis_pengaduan    = $request->post('Pengaduan')['jenis_pengaduan'];
            $model->keterangan_pengadu = $request->post('Pengaduan')['keterangan_pengadu'];
            $folder                    = Yii::getAlias('@webroot/').Yii::getAlias('@pengaduan/');
            $file                      = UploadedFile::getInstance($model, 'virtual');

             if (!is_null($file)) 
             {
                $filename = sha1(date('YmdHis').time());
                $mfile    = Yii::$app->mfile->upload($file, $folder, $filename);
               if ($mfile) {
                  $model->foto = $mfile;
                 }
             }else{
               Yii::$app->session->setFlash('success', 'Mohon Untuk Upload Gambar'); 
               return $this->redirect(['create']); 
             }
           
            if($model->save(false)){
                Yii::$app->session->setFlash('success', 'Berhasil Dilaporakan'); 
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
     * Updates an existing Pengaduan model.
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
     * Deletes an existing Pengaduan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Berhasil Dihapus');  
        return $this->redirect(['index']);
    }


    public function actionKonfirmasi($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $request  = Yii::$app->request;
            $model->keterangan_pelapor = $request->post('Pengaduan')['keterangan_pelapor'];
            $folder   = Yii::getAlias('@webroot') . Yii::getAlias('@pengaduan/');
            $file     = UploadedFile::getInstance($model, 'virtual2');
            if (!is_null($file)) {
                $filename = sha1(date('YmdHis') . time());
                $mfile    = Yii::$app->mfile->upload($file, $folder, $filename);
                if ($mfile) {
                    $model->foto_pelapor = $mfile;
                }
            } else {
                Yii::$app->session->setFlash('success', 'Mohon Untuk Upload Gambar');
                return $this->redirect(['create']);
            }

            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', 'Berhasil Dikonfirmasi');
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('error', 'Ada yang error');
                return $this->redirect(['index']);
            }
        }
        return $this->render('konfirmasi', [
            'model' => $model,
        ]);

    }

    /**
     * Finds the Pengaduan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pengaduan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pengaduan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
