<div class="row">
    <div class="col-md-3">
        <?= \yii\helpers\Html::img($model->user->linkpreview, ['alt'=> $model->id, 'class' => 'img-responsive pad']); ?>
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
                <th style="text-align: center">Status</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="text-align: center"><?= date('d-M-Y', strtotime($model->tgl_masuk_kos)) ?></td>
                <td style="text-align: center"><?= date('d-M-Y', strtotime($model->tgl_berakhir_kos)) ?></td>
                <td style="text-align: center"><?= $model->periode_kosan ?></td>
                <td style="text-align: center"><span class="badge bg-red"><?= $model->status_bayar ?></span></td>
            </tr>
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
    </div>
  </div>
</div>