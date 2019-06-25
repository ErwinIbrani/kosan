<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Kosan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kosan-form">
  <div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Form Kosan</h3>
     </div>
    <?php
    $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]);
    ?>

     <div class="box-body">
       <div class="row">
        <div class="col-md-12">
           
        <div class="form-group">
          <?= $form->field($kosanModel, 'nama_kosan')->textInput(['maxlength' => true, 'readonly' => true]) ?>
         </div>

        <div class="form-group">
         <?= $form->field($kosanModel, 'harga_perbulan')->textInput(['maxlength' => true, 'readonly' => true]) ?>
       </div>

       <div class="form-group">
        <?= $form->field($kosanModel, 'alamat_kosan')->textarea(['rows' => 6, 'readonly' => true]) ?>
       </div>

       <div class="form-group">
        <?= $form->field($kosanModel, 'pasilitas')->textarea(['rows' => 6, 'readonly' => true]) ?>
       </div>

       <div class="form-group">
        <?= $form->field($kosanModel, 'jenis_kosan')->dropDownList([ 'Pria' => 'Pria', 'Wanita' => 'Wanita', 'Pria dan Wanita' => 'Pria dan Wanita', ], ['prompt' => '.:Pilil:.', 'readonly' => true]) ?>
      </div>  
       

                               
       <div class="form-group"> 
           <?= $form->field($model, 'kosan_id')->hiddenInput(['value' => $kosanModel->id])->label(false); ?>
           <?= $form->field($model, 'tgl_masuk_kos')->widget(DatePicker::className(), ['dateFormat' => 'php:Y-m-d'])->textInput(['maxlength' => true,]); ?>
         </div> 

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
