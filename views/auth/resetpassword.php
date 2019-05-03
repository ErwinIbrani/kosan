<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<div class="login-box">
  <div class="login-logo">
    <?= Html::a('<b>HDP</b> Admin', ['/secret/']) ?><br>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Enter your new password</p>

    <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
      <div class="form-group has-feedback">
        <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <?= Html::a('Cancel', ['/secret/auth/login'],['class'=>'text-center']) ?>
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Save</button>
        </div>
      </div>
    <?php ActiveForm::end(); ?>

  </div>
</div>
