<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
  

    public function actionIndex()
    {
       echo('Dahboards');
    }

  

    

    public function actionImage($code)
    {
        return Yii::$app->mfile->getImage($code);
    }
}
