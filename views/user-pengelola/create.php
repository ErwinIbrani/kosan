<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserKosan */

$this->title = 'Buat Pengelola Kosan baru';
$this->params['breadcrumbs'][] = ['label' => 'Pengelola Kosan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-kosan-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
