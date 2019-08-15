<?php
namespace app\controllers;


use app\models\AuthAssignment;
use app\models\identity\SignupForm;
use app\models\identity\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\filters\AccessControl;
use Yii;
use yii\web\UploadedFile;

class UserPengelolaController extends Controller
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
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->searchUserPengelola(\Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new UserKosan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->view->title = 'Buat Pengelola';
        $transaction       = Yii::$app->db->beginTransaction();
        $model             = new SignupForm();
        try{
            if ($model->load(Yii::$app->request->post())){
                $modelUser                    = new User();
                $request                      =  Yii::$app->request;
                $modelUser->nama_lengkap      = $request->post('SignupForm')['nama_lengkap'];
                $modelUser->username          = $request->post('SignupForm')['username'];
                $modelUser->status            = 10;
                $modelUser->jenis_kelamin     = $request->post('SignupForm')['jenis_kelamin'];
                $modelUser->tanggal_lahir     = $request->post('SignupForm')['tanggal_lahir'];
                $modelUser->tempat_lahir      = $request->post('SignupForm')['tempat_lahir'];
                $modelUser->no_telepon        = $request->post('SignupForm')['no_telepon'];
                $modelUser->alamat            = $request->post('SignupForm')['alamat'];
                $modelUser->status_pengelola  = 1;
                $modelUser->setPassword($request->post('SignupForm')['password']);
                $modelUser->generateAuthKey();
                $folder                  = Yii::getAlias('@webroot/').Yii::getAlias('@potoktp/');
                $file                    = UploadedFile::getInstance($model, 'poto_ktp');
                if (!is_null($file))
                {
                    $filename = sha1(date('YmdHis').time());
                    $mfile    = Yii::$app->mfile->upload($file, $folder, $filename);
                    if ($mfile) {
                        $modelUser->poto_ktp = $mfile;
                    }
                }
                if($modelUser->save()){
                    $modelRole = new AuthAssignment();
                    $modelRole->item_name = 'Bagian Pemeliharaan';
                    $modelRole->user_id   = $modelUser->id;
                    $modelRole->save(false);
                    //$model->sendVerification($modelUser->id);
                    $transaction->commit();
                    Yii::$app->session->setFlash('success', 'Anda Berhasil Mendambahkan Pengelola');
                    return $this->redirect(['index']);
                }
                else{
                    $transaction->rollBack();
                    Yii::$app->session->setFlash('error', 'Ada yang error');
                    return $this->redirect(['index']);
                }
            }
        }catch (\Exception $exception)
        {
            $transaction->rollBack();
            throw $exception;
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


}