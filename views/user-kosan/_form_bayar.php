<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\UserKosan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-kosan-form">
 <div class="kosan-form">
  <div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Form Upload Bukti</h3>
     </div>

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>
  
   <div class="box-body">
       <div class="row">
        <div class="col-md-12">

         <div class="form-group">
           <?= $form->field($model, 'bukti_pembayaran_virtual')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
           ])->label('Upload Bukti Pembayaran'); ?>
          </div>


           <?php  if($model->nunggak != 0): ?>
            <div class="form-group">
                <?= $form->field($model, 'bayar')->textInput(['readonly' => true])->label('DP') ?>
            </div>
               <div class="form-group">
                   <?= $form->field($model, 'nunggak')->textInput(['readonly' => true])->label('Sisa Pembayaran') ?>
               </div>
               <div class="form-group">
                <?= $form->field($model, 'total')->textInput(['readonly' => true])->label('Total') ?>
            </div>
            <?php endif;?>

       </div>
     </div>     


    <div class="box-footer">
    <div class="form-group">
        <?= Html::submitButton('Bayar', ['class' => 'btn btn-success']) ?>
    </div>
    </div> 

     <?php ActiveForm::end(); ?>

    </div>
  </div>
</div> 