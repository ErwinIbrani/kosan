<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Kosan */
/* @var $form yii\widgets\ActiveForm */

$script = <<< JS
    $(document).ready(function () {
    $("#tes").hide();
    $("#changed").change(function (){
          if($(this).val() === 'Cash') {
            $("#tes").hide();
         } 
         else if($(this).val() === 'DP') {
            $("#tes").show();
         }   
    });
});
JS;
$this->registerJs($script);
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
                <div class="form-group field-kosan-harga_perbulan required has-success">
                    <label class="control-label" for="kosan-harga_perbulan">Harga Perbulan</label>
                    <input type="text" id="kosan-harga_perbulan" class="form-control" name="Kosan[harga_perbulan]" value="Rp.<?= number_format($kosanModel->harga_perbulan) ?>" readonly="" aria-required="true" aria-invalid="false">
                    <div class="help-block"></div>
                </div>
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
          <?= $form->field($model, 'jenis_pembayaran')->dropDownList([ 'Cash' => 'Cash', 'DP' => 'DP'], ['prompt' => '.:Pilih Pembayaran:.', 'id' => 'changed']) ?>
       </div>

      <div class="form-group">
          <div id="tes">
          <?= $form->field($model, 'bayar')->textInput(['maxlength' => true]) ?>
          </div>
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
