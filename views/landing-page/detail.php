<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;
use app\assets\FancyAsset;

FancyAsset::register($this);
?>


<div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Kosan <?= $model->nama_kosan ?></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">

                <div class="col-md-4">
                  <?= Html::img($model->linkpreview, ['class'=>'img-thumbnail', 'style' => 'height:100%;width:100%']); ?>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                   <div class="direct-chat-text">
                     Nama Kosan : <?= $model->nama_kosan ?>
                    </div><br/>

                    <div class="direct-chat-text">
                     Jumlah Kamar Kosong : <?= $model->jumlah_kamar ?>
                    </div><br/>

                    <div class="direct-chat-text">
                        Jumlah Kamar Terpakai : <?= $countkost ?>
                    </div><br/>

                    <div class="direct-chat-text">
                     Harga Bulanan Rp: <?= number_format($model->harga_perbulan) ?>
                    </div><br/>

                    <div class="direct-chat-text">
                     Alamat : <?= $model->alamat_kosan ?>
                    </div><br/>

                    <div class="direct-chat-text">
                     Pasilitas : <?= $model->pasilitas ?>
                    </div><br/>

                    <div class="direct-chat-text">
                     Jenis Kosan : <?= $model->jenis_kosan ?>
                    </div><br/>

                    <!--<div class="direct-chat-text">
                     Status Kosan : <?/*= $model->status */?>
                    </div><br/>-->
                  
                  <div class="pull-right">
                  <?php 
                       if(Yii::$app->user->isGuest){ ?>
                          <?= Html::a('Pilih Kosan',
                                    ['/auth/login'],
                                    ['class' => 'btn btn-info btn-sm btn-flat']
                        ) ?>
                        <?php } 
                        else
                        { ?>
                          <?= Html::a('Pilih Kosan',
                                    ['/kosan/pilih/', 'id' => $model->id],
                                    ['class' => 'btn btn-info btn-sm btn-flat']
                              ) ?>
                      <?php } 
                    ?>  
                  </div>
                      
                </div>

                <div class="col-md-2">
                  <div class="pull-right">

                   <?= Html::a('Kembali',
                                    ['/landing-page/index'],
                                    ['class' => 'btn btn-primary btn-sm btn-flat']
                                ) ?>


                   </div>             
                </div>

                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
          </div>
          <!-- /.box -->
        </div>