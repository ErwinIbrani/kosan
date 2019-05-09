<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KosanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kosan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['search'],
        'method' => 'post',
        'fieldConfig' => [
        'options' => [
            'tag' => false,
        ],
    ],
    ]); ?>

    
    <div class="input-group input-group-sm">
     <?= $form->field($model, 'alamat_kosan')->textInput(['placeholder' => 'Cari Alamat Kosan', 'class' => 'form-control'])->label(false) ?>
    <span class="input-group-btn">
      <?= Html::submitButton('Search', ['class' => 'btn btn-info btn-flat']) ?>
    </span>
    </div>
    <?php ActiveForm::end(); ?>

</div>
