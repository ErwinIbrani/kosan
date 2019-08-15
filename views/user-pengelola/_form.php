<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;
use yii\jui\DatePicker;

?>

<div class="pengaduan-form">
    <div class="kosan-form">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= Html::encode('Form Pengelola'); ?></h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        $form = ActiveForm::begin([
                            'options' => ['enctype' => 'multipart/form-data']
                        ]);
                        ?>
                            <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true,])->label('Nama Pengelola'); ?>

                            <?= $form->field($model, 'username')->textInput(['maxlength' => true,]); ?>

                            <?= $form->field($model, 'jenis_kelamin')->dropDownList(
                                    ['Laki-laki'  => 'Laki-laki',
                                        'Perempuan'   => 'Perempuan'],
                                    ['prompt'    => 'Select...']
                                ); ?>

                            <?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::className(), ['dateFormat' => 'php:Y-m-d'])->textInput(['maxlength' => true,]); ?>

                           <?= $form->field($model, 'tempat_lahir') ?>

                           <?= $form->field($model, 'no_telepon') ?>

                           <?= $form->field($model, 'password')->passwordInput() ?>

                           <?= $form->field($model, 'alamat')->textarea(['rows' => '6']) ?>

                           <?= $form->field($model, 'poto_ktp')->widget(FileInput::classname(), [
                                    'options' => ['accept' => 'image/*'],
                                ]); ?>



                            <div class="box-footer">
                                <div class="form-group">
                                    <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
                                    <?= Html::resetButton('Batal', ['class' => 'btn btn-danger']) ?>
                                </div>
                            </div>
                            <?php ActiveForm::end(); ?>.


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
