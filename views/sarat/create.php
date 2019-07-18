<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Saratketentuan */

$this->title = 'Create Sarat & ketentuan';
$this->params['breadcrumbs'][] = ['label' => 'Sarat & ketentuan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengaduan-form">
    <div class="kosan-form">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= Html::encode('Form Sarat & Ketentuan'); ?></h3>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">

                        <?= $this->render('_form', [
                            'model' => $model,
                        ]) ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
