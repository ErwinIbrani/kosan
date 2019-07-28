<?php
$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-3 col-xs-6">
     <?= $this->render('_part/_userkost', ['kosan' => $userKostModel, 'model' => $kosanModel]) ?>
    </div>



    <div class="col-lg-3 col-xs-6">
        <?= $this->render('_part/_kamarkosong', ['model' => $kosanModel]) ?>
    </div>

    <div class="col-lg-3 col-xs-6">
        <?= $this->render('_part/_jumlahbayar', ['modelBayar' => $bayar]) ?>
    </div>

    <div class="col-lg-3 col-xs-6">
        <?= $this->render('_part/_blmkonfirmasi', ['notkonfimasi' => $notkonfim]) ?>
    </div>

    <div class="col-md-12 col-sm-6 col-xs-12">
        <?= $this->render('_part/_keluhan', ['model' => $keluhan]) ?>
    </div>

</div>