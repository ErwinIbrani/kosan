<div class="small-box bg-red">
    <div class="inner">
        <p>Tanggal Bayar Hari Ini</p>
        <h3><?= $modelBayar ?></h3>
    </div>
    <div class="icon">
        <i class="fa fa-credit-card"></i>
    </div>
    <?= \yii\helpers\Html::a('<i class="fa fa-arrow-circle-right"></i> Lihat Detail',['/user-kosan/date', 'today' => date("Y-m-d")], ['class' => 'small-box-footer']) ?>
</div>