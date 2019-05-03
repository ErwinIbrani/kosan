<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<div class="login-box">
  <div class="login-logo">
    <?= Html::a('<b>HDP</b> Admin', ['/secret/']) ?><br>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p>Forgot your password? Please enter your email. You will receive an email containing a link to reset your password.</p>

    <?php $form = ActiveForm::begin(['id' => 'forgot-password']); ?>
      <div class="form-group has-feedback">
        <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <?= Html::a('Cancel', ['/secret/auth/login'],['class'=>'text-center']) ?><br>
        </div>

        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Confirm</button>
        </div>
        <!-- /.col -->
      </div>
    <?php ActiveForm::end(); ?>


  </div>
</div>
