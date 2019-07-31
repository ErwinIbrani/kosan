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
            'status'
        ],
    ]) ?>
    </tbody>
  </table>

    <!-- USERS LIST -->
        <div class="box box-danger">
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <ul class="users-list clearfix">
                    <?php
                    $modelGambar =\app\models\GambarKosan::find()->where(['kosan_id' => $model->id])->all();
                    foreach ($modelGambar as $value): ?>
                    <li>
                        <?=
                          Html::img(\yii\helpers\Url::to('@web/uploads/potokosan/' . $value->gambar, true),['width'=>100, 'class' => 'img-thumbnail']);
                        ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <!-- /.users-list -->
            </div>
            <!-- /.box-body -->
            <!-- /.box-footer -->
        </div>
        <!--/.box -->
    </div>
  </div>
