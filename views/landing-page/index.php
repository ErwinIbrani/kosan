<?php

use yii\widgets\LinkPager;
use yii\helpers\Html;
use kv4nt\owlcarousel\OwlCarouselWidget;
?>

<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                <div class="collapse navbar-collapse" id="collapse-menu">
                   <div class="col-md-6">
                    <!--Kosongkan-->
                   </div>
                     <div class="col-md-6">
                        <ul class="nav navbar-nav navbar-right">
                            <?php
                            if(\Yii::$app->user->isGuest){ ?>
                            <li>
                                <?= Html::a(Html::tag('i', '', ['class' => 'fa fa-key']) . ' Login', ['auth/login'], ['class' => 'text-blue', 'title' => 'Login']) ?>
                            </li>

                             <li>
                                 <?= Html::a(Html::tag('i', '', ['class' => 'fa fa-user']) . ' Register', ['auth/register'], ['class' => 'text-blue', 'title' => 'Register']) ?>
                             </li>
                            <?php }
                             else{ ?>
                                <!-- <li>
                                     <?/*= Html::a(Html::tag('i', '', ['class' => 'fa fa-bars']) . ' Kembali Ke Menu', ['/dashboard/'], ['class' => 'text-blue', 'title' => 'Ke Menu Utama']) */?>
                                 </li>-->
                                 <li>
                                 <?= Html::a(Html::tag('i', '', ['class' => 'fa fa-sign-out']) . ' Logout', ['/auth/logout'], ['class' => 'text-blue', 'title' => 'Logout']) ?>
                                 </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <?= $this->render('_search', ['model' => $searchModel]) ?>
                    </div>
                </div>
            </div>
            <br/>


              <div class="col-md-12">
                  <br/>
                  <div class="box box-solid">

                      <!-- /.box-header -->
                      <div class="box-body">
                          <?php
                          OwlCarouselWidget::begin([
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
                          ?>
                          <!--get DataFromDB-->
                          <?php foreach ($models as $key => $value) { ?>
                              <div class="item-class">
                                  <?= Html::img($value->linkpreview, ['alt' => $value->id, 'style' => 'width:320px']); ?>
                              </div>
                          <?php } ?>
                          <?php OwlCarouselWidget::end(); ?>
                      </div>
                      <!-- /.box-body -->
                  </div>
              </div>

             <?php foreach ($models as $key => $value) { ?>
              <div class="col-sm-4 col-xs-6">
                  <div class="box box-success box-solid">
                  <div class="box-header with-border">
                      <h3 class="box-title"><?= $value->nama_kosan; ?></h3>
                      <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                      <!-- /.box-tools -->
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                      <span class="info-box-text">Nama Kosan   : <?= $value->nama_kosan ?></span>
                      <span class="info-box-text">Alamat Kosan : <?= $value->alamat_kosan ?></span>
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
        </div>
      </div>