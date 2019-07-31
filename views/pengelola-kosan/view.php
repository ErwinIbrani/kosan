<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\assets\FancyAsset;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->user->nama_lengkap;
$this->params['breadcrumbs'][] = ['label' => 'Pengelola', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
FancyAsset::register($this);
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <div class="box-title">
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </div>
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <tbody>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    [
                        'attribute' => 'nama_lengkap',
                        'label'     => 'Nama Pengelola',
                        'value'    => function($model){
                            return $model->user->nama_lengkap;
                        }
                    ],

                    [
                        'attribute' => 'nama_kosan',
                        'label'     => 'Nama Kosan',
                        'value'    => function($model){
                            return $model->kosan->nama_kosan;
                        }
                    ],
                ],
            ]) ?>

            </tbody>
        </table>
    </div>
</div>
