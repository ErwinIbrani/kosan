<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pengaduan */

$this->title = 'Konfirmasi Kelauhan';
$this->params['breadcrumbs'][] = ['label' => 'Pengaduan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengaduan-create">
    <div class="pengaduan-form">
        <div class="kosan-form">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= Html::encode('Form Konfirmasi Keluahan'); ?></h3>
                </div>

                <?php
                $form = \yii\widgets\ActiveForm::begin([
                    'options' => ['enctype' => 'multipart/form-data']
                ]);
                ?>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'keterangan_pelapor')->textarea(['rows' => 6])->label('Keterangan') ?>

                            <?= $form->field($model, 'virtual2')->widget(\kartik\file\FileInput::classname(), [
                                'options' => ['accept'=>'image/*'],
                                'pluginOptions'=>[
                                    'showPreview' => true,
                                    'allowedFileExtensions'=>['jpg', 'gif', 'png', 'bmp'],
                                    'showUpload' => true,
                                    'overwriteInitial' => true,
                                ],
                            ])->label('Upload Bukti Konfirmasi Perbaikan'); ?>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <div class="form-group">
                        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>

                <?php \yii\widgets\ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>