<!-- small box -->
<div class="small-box bg-aqua">
    <div class="inner">
        <p>Kosan Terisi</p>
        <h3><?= $kosan ?></h3>
    </div>
    <div class="icon">
        <i class="fa fa-home"></i>
    </div>
    <?= \yii\helpers\Html::a('<i class="fa fa-arrow-circle-right"></i> Lihat Detail',['/user-kosan/user', 'kosan_id' => $model->id], ['class' => 'small-box-footer']) ?>
</div>