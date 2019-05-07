<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KosanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kosan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama_kosan') ?>

    <?= $form->field($model, 'jumlah_kamar') ?>

    <?= $form->field($model, 'harga_perbulan') ?>

    <?= $form->field($model, 'alamat_kosan') ?>

    <?php // echo $form->field($model, 'pasilitas') ?>

    <?php // echo $form->field($model, 'jenis_kosan') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'gambar_kosan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
