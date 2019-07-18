<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SaratKetentuan */

$this->title = 'Create Sarat Ketentuan';
$this->params['breadcrumbs'][] = ['label' => 'Sarat Ketentuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sarat-ketentuan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
