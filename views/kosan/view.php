<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\assets\FancyAsset;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->nama_kosan;
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
            'nama_kosan',
            'jumlah_kamar',
            'harga_perbulan',
            'alamat_kosan:ntext',
            'pasilitas:ntext',
            'jenis_kosan',
            'status',
            [
                'attribute' => 'gambar_kosan',
                'label'     => 'Gambar Kosan',
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
        ],
    ]) ?>
    </tbody>
  </table>
  </div>
</div>
