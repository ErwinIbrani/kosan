<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\widgets\Alert;
?>

<div class="login-box">
  <div class="login-logo">
    <?= Html::encode('Login') ?>

    <br>
  </div>

  <div class="login-box-body">
    <?= Alert::widget() ?>
    <p class="login-box-msg">Please enter your email and password</p>
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
      <div id="required">
        <div class="form-group has-feedback">
          <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        </div>
        <div class="form-group has-feedback">
          <?= $form->field($model, 'password')->passwordInput() ?>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <?= $form->field($model, 'rememberMe')->checkbox() ?>
        </div>

        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat btn-login">Login</button>
        </div>
      </div>
    <?php ActiveForm::end(); ?>
    <?=  Html::a('Daftar Akun', ['/auth/register']); ?>
  </div>
</div>
