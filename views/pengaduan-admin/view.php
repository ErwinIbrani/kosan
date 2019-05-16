<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\assets\FancyAsset;
FancyAsset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Label */

$this->title = $model->kosan->nama_kosan;
$this->params['breadcrumbs'][] = ['label' => 'Pengaduan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
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
                'label'      => 'Nama Kosan',
                'attribute'  => 'nama_kosan',
                'value'      => function($model) {
                  return $model->kosan->nama_kosan;
                },
             ],

             [
                'label'      => 'Jenis Pengaduan',
                'attribute'  => 'jenis_pengaduan',
             ],

             [
                'label'      => 'Keterangan',
                'attribute'  => 'keterangan_pengadu',
                'format'     => 'ntext'
             ],

             [
                 'attribute' => 'foto',
                 'label'     => 'Foto',
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

             [
                'label'      => 'Status Diperbaiki',
                'attribute'  => 'status',
             ],

             [
                'label'      => 'Keterangan Teknisi',
                'attribute'  => 'keterangan_teknisi',
                'format'     => 'ntext'
             ],

             [
                'label'      => 'Tanggal Laporan',
                'attribute'  => 'tanggal_laporan',
                'format'     => 'date'
             ], 
       
        ],
        ]) ?>

    </tbody>
  </table>
</div>
</div>