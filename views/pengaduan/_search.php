<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PengaduanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengaduan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'kosan_id') ?>

    <?= $form->field($model, 'jenis_pengaduan') ?>

    <?= $form->field($model, 'keterangan_pengadu') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'keterangan_teknisi') ?>

    <?php // echo $form->field($model, 'tanggal_laporan') ?>

    <?php // echo $form->field($model, 'tanggal_ditangani') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
