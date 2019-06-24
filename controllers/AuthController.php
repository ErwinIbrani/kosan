<?php

namespace app\controllers;

use app\models\AuthAssignment;
use Yii;
use yii\helpers\Url;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use app\models\identity\SignupForm;
use app\models\identity\LoginForm;
use app\models\identity\User;
use app\models\User as UserRegister;
use yii\web\UploadedFile;


class AuthController extends \yii\web\Controller
{
    public $layout = 'main-login';

    public function actionIndex()
    {
        return $this->redirect(['login']);
    }

      public function actionLogin()
    {
        $this->view->title = 'Login';

        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['/dashboard']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (Yii::$app->request->isAjax) {
                return true;
            }else{
                if(!empty($model->isAdmin($model->email))){
                  return $this->redirect(['/dashboard-admin/']);  
                }else if ($model->isAdmin($model->email === NULL) ){
                    return $this->redirect(['/dashboard']);
              }  
            }
        } 
        else {
            $model->password = '';

            if (Yii::$app->request->isAjax) {
                return $this->renderPartial('login', [
                    'model' => $model,
                ]);
            }else{
                return $this->render('login', [
                    'model' => $model,
                ]);
            }
        }
    }

  
    public function actionRegister()
    {
      $this->view->title = 'Register';
      $transaction       = Yii::$app->db->beginTransaction();
      $model             = new SignupForm();
      try{
          if ($model->load(Yii::$app->request->post())){
              $modelUser                = new User();
              $request                  = Yii::$app->request;
              $modelUser->nama_lengkap  = $request->post('SignupForm')['nama_lengkap'];
              $modelUser->username      = $request->post('SignupForm')['username'];
              $modelUser->status        = 0;
              $modelUser->jenis_kelamin = $request->post('SignupForm')['jenis_kelamin'];
              $modelUser->tanggal_lahir = $request->post('SignupForm')['tanggal_lahir'];
              $modelUser->tempat_lahir  = $request->post('SignupForm')['tempat_lahir'];
              $modelUser->no_telepon    = $request->post('SignupForm')['no_telepon'];
              $modelUser->email         = $request->post('SignupForm')['email'];
              $modelUser->alamat        = $request->post('SignupForm')['alamat'];
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
                  $modelRole->item_name = 'User';
                  $modelRole->user_id   = $modelUser->id;
                  $modelRole->save(false);
                  $model->sendVerification($modelUser->id);
                  $transaction->commit();
                  Yii::$app->session->setFlash('success', 'Silahkkan Konfirmasi E-Mail Anda');
                  return $this->redirect(['register']);
              }
              else{
                  $transaction->rollBack();
                  Yii::$app->session->setFlash('error', 'Ada yang error');
                  return $this->redirect(['register']);
              }
          }
      }catch (\Exception $exception)
      {
          $transaction->rollBack();
          throw $exception;
      }

        return $this->render('register', [
            'model' => $model,
        ]);
    }


    public function actionConfirmation($id, $auth_key)
    {
        $user = UserRegister::find()
            ->where(['id' => $id])
            ->andWhere(['auth_key' => $auth_key])
            ->andWhere(['status' => 0])
            ->one();

        if(!empty($user)){
            $user->status = 10;
            $user->save();
            Yii::$app->session->setFlash('success', 'Please Login');
            return $this->redirect(['login']);
        }
        else{
            Yii::$app->session->setFlash('error', 'Please Login');
            return $this->redirect(['login']);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['login']);
    }

}
