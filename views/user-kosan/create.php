<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserKosan */

$this->title = 'Create User Kosan';
$this->params['breadcrumbs'][] = ['label' => 'User Kosans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-kosan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
