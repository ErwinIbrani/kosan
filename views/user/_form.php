<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
  <div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Reset Password</h3>
     </div>
    <?php $form = ActiveForm::begin(); ?>
     
     <div class="box-body">
       <div class="row">
        <div class="col-md-12">

           <div class="form-group">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'readonly' => true]) ?>
           </div>

           <div class="form-group">
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
           </div>

         </div>
        </div>
      </div>

   <div class="box-footer">
    <div class="form-group">
        <?= Html::submitButton('Reset', ['class' => 'btn btn-success']) ?>
    </div>
   </div> 

    <?php ActiveForm::end(); ?>
   </div>
</div>