<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;
use yii\filters\AccessControl;


class DashboardController extends \yii\web\Controller
{

   public function actionIndex()
  {
      return $this->render('index');
  }

}
