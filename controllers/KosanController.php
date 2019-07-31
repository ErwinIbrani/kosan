<?php

namespace app\controllers;

use app\models\GambarKosan;
use Yii;
use app\models\Kosan;
use app\models\KosanSearch;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UserKosan;
use app\models\User;
use yii\filters\AccessControl;

/**
 * KosanController implements the CRUD actions for Kosan model.
 */
class KosanController extends Controller
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
        if ($model->load(Yii::$app->request->post())) {
            $request = Yii::$app->request;
            $model->nama_kosan = $request->post('Kosan')['nama_kosan'];
            $model->jumlah_kamar = $request->post('Kosan')['jumlah_kamar'];
            $model->harga_perbulan = $request->post('Kosan')['harga_perbulan'];
            $model->alamat_kosan = $request->post('Kosan')['alamat_kosan'];
            $model->pasilitas = $request->post('Kosan')['pasilitas'];
            $model->jenis_kosan = $request->post('Kosan')['jenis_kosan'];

            if ($model->save(false)) {
                $folder = Yii::getAlias('@webroot') . Yii::getAlias('@potokosan/');
                $model->gambar_poto = UploadedFile::getInstances($model, 'gambar_poto');
                if (!is_null($model->gambar_poto)) {
                    foreach ($model->gambar_poto as $key => $value) {
                        $gamabarModel = new GambarKosan();
                        $value->saveAs($folder . $value->baseName . '.' . $value->extension);
                        $gamabarModel->gambar .= $value->baseName . '.' . $value->extension;
                        $gamabarModel->kosan_id = $model->id;
                        $gamabarModel->save(false);
                    }
                } else {
                    Yii::$app->session->setFlash('success', 'Mohon Untuk Upload Gambar');
                    return $this->redirect(['create']);
                }

                Yii::$app->session->setFlash('success', 'Berhasil Disimpan');
                return $this->redirect(['index']);
            } else {
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
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {

            $request = Yii::$app->request;
            $model->nama_kosan = $request->post('Kosan')['nama_kosan'];
            $model->jumlah_kamar = $request->post('Kosan')['jumlah_kamar'];
            $model->harga_perbulan = $request->post('Kosan')['harga_perbulan'];
            $model->alamat_kosan = $request->post('Kosan')['alamat_kosan'];
            $model->pasilitas = $request->post('Kosan')['pasilitas'];
            $model->jenis_kosan = $request->post('Kosan')['jenis_kosan'];
            if ($model->save()) {
                $folder             = Yii::getAlias('@webroot') . Yii::getAlias('@potokosan/');
                $model->gambar_poto = UploadedFile::getInstances($model, 'gambar_poto');
                $gamabarModels      = GambarKosan::find()->where(['kosan_id' => $id])->count();
                if (!is_null($model->gambar_poto)) {
                    foreach ($model->gambar_poto as $key => $value) {
                        foreach ($gamabarModels as $gamabarModel) {
                            $value->saveAs($folder . $value->baseName . '.' . $value->extension);
                            $gamabarModel->gambar .= $value->baseName . '.' . $value->extension;
                            $gamabarModel->kosan_id = $model->id;
                            $gamabarModel->save(false);
                        }
                    }
                } else {
                    Yii::$app->session->setFlash('success', 'Mohon Untuk Upload Gambar');
                    return $this->redirect(['create']);
            }

            Yii::$app->session->setFlash('success', 'Kosan Berhasil Diupdate');
            return $this->redirect(['index']);
        } else {
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
        Yii::$app->session->setFlash('success', 'Berhasil Dihapus');
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


    public function actionPilih($id)
    {
        $this->view->title = 'Pilih Kosan';
        $kosanModel = $this->findModel($id);
        $model = new UserKosan();
        if ($model->load(Yii::$app->request->post())){
            $request                  = Yii::$app->request;
            $model->user_id           = Yii::$app->user->identity->id;
            $model->kosan_id          = $request->post('UserKosan')['kosan_id'];
            $model->tgl_masuk_kos     = $request->post('UserKosan')['tgl_masuk_kos'];
            $model->tgl_berakhir_kos  = date("Y-m-d", strtotime(''.$model->tgl_masuk_kos.' +1 month'));
            $cek_bayar                = Kosan::findOne($model->kosan_id);

            (float)$model->bayar      = (empty($request->post('UserKosan')['bayar'])) ? $cek_bayar->harga_perbulan : $request->post('UserKosan')['bayar'];
            (float)$model->nunggak    = (float)$cek_bayar->harga_perbulan - (float)$model->bayar;
            (float)$model->total      = (float)$cek_bayar->harga_perbulan;
            $ada                      = $this->cek($model->user_id);
            if((float)$model->total <= (float)$model->nunggak){
                Yii::$app->session->setFlash('error', 'Maaf!! Masukan Jumlah Yang Benar');
                return $this->redirect(['/dashboard/index/']);
            }

            else if(!empty($ada)){
                Yii::$app->session->setFlash('error', 'Maff !! Anda Sudah Memilih Kosan');
                return $this->redirect(['/dashboard/index/']);
            }

            else{
                if($model->save(false)){
                    $user = User::findOne($model->user_id);
                    $user->status_kost = 1;
                    if($user->save(false)) {
                        $kosan = Kosan::findOne($kosanModel->id);
                        $kosan->jumlah_kamar = $kosanModel->jumlah_kamar - 1;
                        $kosan->save();
                        Yii::$app->session->setFlash('success', 'Anda Telah Memilih Kosan');
                        return $this->redirect(['/dashboard/index/']);
                    }
                }
            }
        }
        return $this->render('pilih_kosan', ['kosanModel' => $kosanModel, 'model' => $model]);
    }



    private function cek($user_id)
    {
        return UserKosan::find()
            ->where(['user_id' => $user_id])
            ->one();
    }

}