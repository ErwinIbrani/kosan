<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PengelolaKosan */

$this->title = 'Update Pengelola Kosan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pengelola Kosans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pengelola-kosan-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
