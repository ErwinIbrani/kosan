<div class="row">
  <!--  <div class="col-md-3">
        <?/*= \yii\helpers\Html::img($model->linkpreview, ['alt'=> $model->id, 'class' => 'img-responsive pad']); */?>
    </div>-->

<div class="col-md-12">
<div class="box b0x-info box box-success">
    <div class="box-header">
        <h3 class="box-title">Pengurus Kosan</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding box box-success">
        <table class="table table-condensed">
            <thead>
            <tr>
                <th style="text-align: center">Nama Lengkap</th>
                <th style="text-align: center">Username</th>
                <th style="text-align: center">Jenis Kelamin</th>
                <th style="text-align: center">No Telepon</th>
            </tr>
            </thead>
            <tbody>
            <?php
              $user_kosan = \app\models\PengelolaKosan::find()->where(['kosan_id' => $model->id])->all();
              $user_id = [];
              foreach ($user_kosan as $kosan){
                 $user_id [] = $kosan->user_id;
              }
              $userModels = \app\models\User::find()->where(['in', 'id', $user_id])->all();
             foreach ($userModels as $userModel): ?>
              <tr>
                  <td style="text-align: center"><?= $userModel->nama_lengkap ?></td>
                  <td style="text-align: center"><?= $userModel->username ?></td>
                  <td style="text-align: center"><?= $userModel->jenis_kelamin ?></td>
                  <td style="text-align: center"><?= $userModel->no_telepon ?></td>
              </tr>
            <?php
             endforeach;
            ?>
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
    </div>
  </div>
</div>