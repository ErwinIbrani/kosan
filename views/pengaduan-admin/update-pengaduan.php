<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Pengaduan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengaduan-form">
<div class="kosan-form">
  <div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode('Form Pengaduan Keluahan'); ?></h3>
     </div>

       <?php
        $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data']
        ]);
        ?>
      
    <div class="box-body">
       <div class="row">
        <div class="col-md-12">
        <?= $form->field($model, 'keterangan_teknisi')->textarea(['rows' => 6]) ?>
       
        </div>
       </div>
      </div>  

    <div class="box-footer">
    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>
    </div> 

     <?php ActiveForm::end(); ?>

   </div>
</div>
</div> 