<?php

use yii\widgets\LinkPager;
use yii\helpers\Html;
?>

<?php

if(Yii::$app->user->identity->status_kost === 1){ ?>


<?php } else { ?>

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= $this->render('_search', ['model' => $searchModel]) ?> 
             </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">

              <?php foreach ($models as $key => $value) { ?>
                <li class="item">
                  <div class="product-img">
                     <?= Html::img($value->linkpreview, ['class'=>'img-thumbnail', 'style' => 'height:120px;width:100px']); ?>
                     <br/>
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title"><?= $value->nama_kosan ?>
                      <span class="label label-warning pull-right">Rp. <?= number_format($value->harga_perbulan) ?>/Bulan</span></a>
                    <span class="product-description">
                          Alamat : <?= $value->alamat_kosan ?>
                    </span>
                    <span class="product-description">
                         Pasilitas:  <?= $value->pasilitas ?>
                    </span>
                    <span class="product-description">
                         Jenis Kosan:  <?= $value->jenis_kosan ?>
                    </span>
                   <span class="product-description">
                         Sisa Kamar:  <?= $value->jumlah_kamar ?>
                    </span>
                    <span class="product-description">
                     <?= Html::a('Pilih',
                                    ['/landing-page/detail', 'id' => $value->id],
                                    ['class' => 'btn btn-primary btn-xs']
                                ) ?>
                    </span>            
                  </div>
                </li>
               <?php } ?>
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
             <div class="box-footer text-center">
              <div class="uppercase"><?= LinkPager::widget(['pagination' => $pages]); ?></div>
            </div>
            <!-- /.box-footer -->
       </div>
<?php } ?>