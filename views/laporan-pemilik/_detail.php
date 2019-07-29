<div class="row">
    <div class="col-md-3">
        <?= \yii\helpers\Html::img($model->linkpreview, ['alt'=> $model->id, 'class' => 'img-responsive pad']); ?>
    </div>

<div class="col-md-9">
<div class="box b0x-info box box-success">
    <div class="box-header">
        <h3 class="box-title">History Pembayaran Kosan</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding box box-success">
        <table class="table table-condensed">
            <thead>
            <tr>
                <th style="text-align: center">Tanggal Awal Kost</th>
                <th style="text-align: center">Tanggal Habis Kost</th>
                <th style="text-align: center">Periode</th>
                <th style="text-align: center">Status Pembayaran</th>
            </tr>
            </thead>
            <tbody>
            <?php
              $user_kosan = \app\models\UserKosan::find()->where(['user_id' => $model->id])->all();
              foreach ($user_kosan as $kosan): ?>
            <tr>
                <td style="text-align: center"><?= date('d-M-Y', strtotime($kosan->tgl_masuk_kos)) ?></td>
                <td style="text-align: center"><?= date('d-M-Y', strtotime($kosan->tgl_berakhir_kos)) ?></td>
                <td style="text-align: center"><?= $kosan->periode_kosan ?></td>
                <td style="text-align: center"><span class="badge bg-red"><?= $kosan->status_bayar ?></span></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
    </div>
  </div>
</div>