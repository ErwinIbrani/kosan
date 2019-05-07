<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\assets\FancyAsset;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->nama_lengkap;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
FancyAsset::register($this);
?>
<div class="box box-primary">
 <div class="box-header with-border">
   <div class="box-title">
   <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            'nama_lengkap',
            'username',
            'jenis_kelamin',
            'tanggal_lahir',
            'tempat_lahir',
            'no_telepon',
            'email:email',
            //'status',
            'alamat:ntext',
            [
                'attribute' => 'poto_ktp',
                'label'     => 'Gambar KTP',
                'format'    => 'raw',
                'value'    => function($model) {
                return 
                  '<a data-fancybox="gallery" href='.$model->linkpreview.'>
                  '.Html::img($model->linkpreview, 
                  ['alt' => 'example1', 
                   'class'=>'img-thumbnail img-responsive',
                   'style' => 'border: 1px solid #ddd;
                    border-radius: 4px;
                    padding: 5px;
                    width: 100px;'
                  ]).'
                  </a>'; 
                },
            ],
            'tanggal_daftar',
        ],
    ]) ?>
    </tbody>
  </table>
  </div>
</div>
