<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;

use app\models\identity\SignupForm;
use app\models\identity\LoginForm;
use app\models\identity\PasswordResetRequestForm;
use app\models\identity\ResetPasswordForm;


class AuthController extends \yii\web\Controller
{
    public $layout = 'main-login';

    public function actionIndex()
    {
        return $this->redirect(['login']);
    }

    public function actionLogin()
    {
        $this->view->title = 'Login Admin';

    	  if (!Yii::$app->user->isGuest) {
            return $this->redirect(['/dashboard']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (Yii::$app->request->isAjax) {
                return true;
            }else{
                if(!empty($model->isBuyer($model->username))){
                  return $this->redirect(['/guest/search-production']);  
                }else if ($model->isBuyer($model->username === NULL) ){
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

    public function actionForgotpassword()
    {
        $this->view->title = 'Forgot Password';

    	$model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->redirect(['login']);
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we cannot reset the password for the email address provided.');
            }
        }

        return $this->render('forgotpassword', [
            'model' => $model,
        ]);
    }

    public function actionResetpassword($token)
    {
        $this->view->title = 'Reset Password';

        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'The new password has been successfully saved.');

            return $this->redirect(['login']);
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionRegister()
    {
        $this->view->title = 'Register';

    	$model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->redirect(['/dashboard']);
                }
            }
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['login']);
    }

}
