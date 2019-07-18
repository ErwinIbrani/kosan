<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Saratketentuan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="saratketentuan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'syarat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ketentuan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
