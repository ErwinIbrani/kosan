<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pengaduan */

$this->title = 'Create Pengaduan';
$this->params['breadcrumbs'][] = ['label' => 'Pengaduans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengaduan-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
