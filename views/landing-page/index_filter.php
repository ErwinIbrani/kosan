<?php

use yii\widgets\LinkPager;
use yii\helpers\Html;
?>

<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                <?= Html::a('Cari Lagi',
                                    ['/landing-page/index'],
                                    ['class' => 'btn btn-info btn-sm btn-flat']
                                ) ?>
            </div>
            <br/>
            <!-- ./box-body -->
            <div class="box-body">
              <div class="row">
              <?php foreach ($models as $key => $value) { ?>
                <div class="col-sm-4 col-xs-6">
                   <div class="info-box"  style="height: 100px;">
                    <span class="info-box-icon" style="height: 100px;">
                      <?= Html::img($value->linkpreview, ['class'=>'img-thumbnail', 'style' => 'height:100%;width:100%']); ?>
                    </span>
                     <div class="info-box-content">
                       <span class="info-box-text"><?= $value->nama_kosan ?></span>
                       <span class="info-box-text"><?= $value->alamat_kosan ?></span>
                       <span class="info-box-number">Rp. <?= number_format($value->harga_perbulan) ?>/Bulan</span>
                       <div class="pull-right">
                        <?= Html::a('Detail',
                                    ['/landing-page/detail', 'id' => $value->id],
                                    ['class' => 'btn btn-primary btn-sm btn-flat']
                                ) ?>
                      </div>
                     </div>
                   </div>
                </div>
               <?php } ?>
              </div>
              <div class="pull-right">
              <?= LinkPager::widget(['pagination' => $pages]); ?>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div> 



<!--       <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                    <h5 class="description-header">$35,210.43</h5>
                    <span class="description-text">TOTAL REVENUE</span>
                  </div> -->