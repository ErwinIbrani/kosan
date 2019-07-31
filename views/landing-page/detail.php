<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;
use app\assets\FancyAsset;

FancyAsset::register($this);
?>


<div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h1 class="box-title">Kosan <?= $model->nama_kosan ?></h1>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <div class="row">
                  <?php
                  \kv4nt\owlcarousel\OwlCarouselWidget::begin([
                      'container' => 'div',
                      'containerOptions' => [
                          'id' => 'container-id',
                          'class' => 'container-class'
                      ],
                      'pluginOptions'    => [
                          'autoplay'          => true,
                          'autoplayTimeout'   => 3000,
                          'items'             => 3,
                          'loop'              => true,
                          'itemsDesktop'      => [1199, 3],
                          'itemsDesktopSmall' => [979, 3]
                      ]
                  ]);
              $gambars = \app\models\GambarKosan::find()->where(['kosan_id' => $model->id])->all();
              foreach ($gambars as $gambar => $value): ?>
                <div class="col-md-12">
                  <?=  Html::img(\yii\helpers\Url::to('@web/uploads/potokosan/' . $value->gambar, true),
                      ['style' => 'height:100%;width:100%', 'class' => 'img-thumbnail']);
                  ?>
                </div>
               <?php endforeach; ?>
               <?php \kv4nt\owlcarousel\OwlCarouselWidget::end(); ?>
                <!-- /.col -->
              </div>
              <br>
                <hr>
                <div class="row">
                <div class="col-md-12">
                  <h3>
                   <div class="direct-chat-text">
                     Nama Kosan : <?= $model->nama_kosan ?>
                    </div><br/>

                    <div class="direct-chat-text">
                     Jumlah Kamar Kosong : <?= $model->jumlah_kamar ?>
                    </div><br/>

                    <div class="direct-chat-text">
                        Jumlah Kamar Terisi : <?= $countkost ?>
                    </div><br/>

                    <div class="direct-chat-text">
                     Harga Bulanan Rp: <?= number_format($model->harga_perbulan) ?>
                    </div><br/>

                    <div class="direct-chat-text">
                     Alamat : <?= $model->alamat_kosan ?>
                    </div><br/>

                    <div class="direct-chat-text">
                     Fasilitas : <?= $model->pasilitas ?>
                    </div><br/>

                    <div class="direct-chat-text">
                     Jenis Kosan : <?= $model->jenis_kosan ?>
                    </div><br/>
                  </h3>
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