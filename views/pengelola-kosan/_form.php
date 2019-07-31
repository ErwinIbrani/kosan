    <?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PengelolaKosan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengelola-kosan-form">
    <div class="kosan-form">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Kosan</h3>
            </div>
            <?php $form = ActiveForm::begin(); ?>

            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">


                        <div class="form-group">
                            <?= $form->field($model, 'user_id')->widget(\kartik\select2\Select2::className(), [
                                'data' => \yii\helpers\ArrayHelper::map($model->pengelolaList(), 'id', 'value'),
                                'attribute' => 'user_id',
                                'theme' => 'default',
                                'options' => [
                                    'multiple' => false,
                                    'placeholder' => 'Pilih Pengelola',
                                ],
                                'pluginOptions' => [
                                    'tags' => false,
                                ],
                            ])->label('Nama Pengelola'); ?>
                        </div>

                        <div class="form-group">
                            <?= $form->field($model, 'kosan_id')->widget(\kartik\select2\Select2::className(), [
                                'data' => \yii\helpers\ArrayHelper::map($model->kosanList(), 'id', 'value'),
                                'attribute' => 'kosan_id',
                                'theme' => 'default',
                                'options' => [
                                    'multiple' => false,
                                    'placeholder' => 'Pilih Kosan',
                                ],
                                'pluginOptions' => [
                                    'tags' => false,
                                ],
                            ])->label('Kosan'); ?>
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
