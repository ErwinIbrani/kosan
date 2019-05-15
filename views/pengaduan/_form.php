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
    
        <?= $form->field($model, 'kosan_id')->widget(Select2::className(), [
             'data' => \yii\helpers\ArrayHelper::map($model->getNamakosan(), 'id', 'value'),
             'attribute' => 'kosan_id',
             'theme' => 'default',
             'options' => [
             'multiple' => false,
             'placeholder' => 'Pilih Nama Kosan',
            ],
            'pluginOptions' => [
            'tags' => false,
            'allowClear' => true,
            ],'class' => 'form-control',
        ]); ?>    
    

        <?= $form->field($model, 'jenis_pengaduan')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'keterangan_pengadu')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'virtual')->widget(FileInput::classname(), [
                                 'options' => ['accept'=>'image/*'],
                                 'pluginOptions'=>[
                                 'showPreview' => true,
                                 'allowedFileExtensions'=>['jpg', 'gif', 'png', 'bmp'],
                                 'showUpload' => true,
                               
                                 'overwriteInitial' => true,
                                ],
                              ])->label('Upload Bukti'); ?>
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