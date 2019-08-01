<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserKosan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-kosan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'kosan_id')->textInput() ?>

    <?= $form->field($model, 'tgl_masuk_kos')->textInput() ?>

    <?= $form->field($model, 'tgl_berakhir_kos')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Tetap' => 'Tetap', 'Keluar' => 'Keluar', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'status_bayar')->dropDownList([ 'Dibayar' => 'Dibayar', 'Belum Dibayar' => 'Belum Dibayar', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'pemebritahuan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
