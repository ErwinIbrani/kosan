<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<div class="register-box">
  <div class="register-logo">
    <?= Html::a('<b>HDP</b> Admin', ['/secret/']) ?><br>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Please complete the data below to register</p>

    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
      <div class="form-group has-feedback">
        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
      </div>
      <div class="form-group has-feedback">
        <?= $form->field($model, 'nik') ?>
      </div>
      <div class="form-group has-feedback">
        <?= $form->field($model, 'phone') ?>
      </div>
      <div class="form-group has-feedback">
        <?= $form->field($model, 'address')->textarea(['rows' => '6']) ?>
      </div>
      <div class="form-group has-feedback">
        <?= $form->field($model, 'username') ?>
      </div>
      <div class="form-group has-feedback">
        <?= $form->field($model, 'email') ?>
      </div>
      <div class="form-group has-feedback">
        <?= $form->field($model, 'password')->passwordInput() ?>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <?= $form->field($model, 'term')->checkbox() ?>
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
      </div>
    <?php ActiveForm::end(); ?>

    <?= Html::a('Already have an account?', ['/auth/login'],['class'=>'text-center']) ?><br>
  </div>
</div>
