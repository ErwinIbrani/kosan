<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PengelolaKosan */

$this->title = 'Pengelola Kosan';
$this->params['breadcrumbs'][] = ['label' => 'Pengelola Kosans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengelola-kosan-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
