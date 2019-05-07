<?php

namespace app\controllers;


use yii\web\Controller;

class LandingPageController extends Controller
{

   public function actionIndex()
  {
      return $this->render('index');
  }


}