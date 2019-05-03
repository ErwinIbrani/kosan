<?php

namespace app\controllers;

class ErrorController extends \yii\web\Controller
{

	public function actions()
	{
			return [
					'index' => [
							'class' => 'yii\web\ErrorAction',
					],
			];
	}

}
