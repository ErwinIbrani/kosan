<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\Kosan */
/* @var $form yii\widgets\ActiveForm */
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
                        <?= $form->field($model, 'nama_kosan')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="form-group">
                        <?= $form->field($model, 'jumlah_kamar')->textInput() ?>
                    </div>

                    <div class="form-group">
                        <?= $form->field($model, 'harga_perbulan')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="form-group">
                        <?= $form->field($model, 'alamat_kosan')->textarea(['rows' => 6]) ?>
                    </div>

                    <div class="form-group">
                        <?= $form->field($model, 'pasilitas')->textarea(['rows' => 6]) ?>
                    </div>

                    <div class="form-group">
                        <?= $form->field($model, 'jenis_kosan')->dropDownList([ 'Pria' => 'Pria', 'Wanita' => 'Wanita', 'Pria dan Wanita' => 'Pria dan Wanita', ], ['prompt' => '.:Pilil:.']) ?>
                    </div>

                    <?= $form->field($model, 'gambar_poto[]')->widget(FileInput::classname(), [
                        'options' => ['accept'=>'image/*','multiple' => 'true'],
                        'pluginOptions'=>[
                            'showPreview' => true,
                            'allowedFileExtensions'=>['jpg', 'gif', 'png', 'bmp'],
                            'showUpload' => true,
                            'overwriteInitial' => true,
                        ],
                    ]); ?>

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