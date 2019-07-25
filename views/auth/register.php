<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;
use yii\jui\DatePicker;

?>
<div class="register-box">
  <div class="register-logo">
    <?= Html::encode('Silahkan Daftar') ?><br>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Silahkan daftar akun terlebih dahulu sebelum memilih kosan yang akan dipilih</p>

    <?php
    $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]);
    ?>

      <div class="form-group has-feedback">
      <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true,]); ?>
      </div>

      <div class="form-group has-feedback">
      <?= $form->field($model, 'username')->textInput(['maxlength' => true,]); ?>
      </div>

      <div class="form-group has-feedback">
        <?= $form->field($model, 'jenis_kelamin')->dropDownList(
                                        ['Laki-laki'  => 'Laki-laki', 
                                         'Perempuan'   => 'Perempuan'],
                                        ['prompt'    => 'Select...']
                             ); ?>
      </div>

      <div class="form-group has-feedback">
        <?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::className(), ['dateFormat' => 'php:Y-m-d'])->textInput(['maxlength' => true,]); ?>
      </div>

      <div class="form-group has-feedback">
        <?= $form->field($model, 'tempat_lahir') ?>
      </div>

      <div class="form-group has-feedback">
        <?= $form->field($model, 'no_telepon') ?>
      </div>

      <div class="form-group has-feedback">
        <?= $form->field($model, 'password')->passwordInput() ?>
      </div>
     
      <div class="form-group has-feedback">
        <?= $form->field($model, 'alamat')->textarea(['rows' => '6']) ?>
      </div>
      
      <div class="form-group has-feedback">
       <?= $form->field($model, 'poto_ktp')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
       ]); ?>
      </div> 

    
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
      </div>
    <?php ActiveForm::end(); ?>.
    <?= Html::a('Apakah anda sudah punya akun?', ['/auth/login'],['class'=>'pull-right']) ?><br>
  </div>
</div>
