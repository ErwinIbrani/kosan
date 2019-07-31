<?php

use yii\widgets\LinkPager;
use yii\helpers\Html;
use app\components\QueryHelper;
?>

<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                <div class="collapse navbar-collapse" id="collapse-menu">
                    <div class="col-md-4">
                        <div style="color:#4454FF; font-family: 'Trocchi',serif; font-size: 62px; font-weight: 800; line-height: 72px; margin: 0 0 20px; text-align: center; text-transform: uppercase;">
                            Papi Kost
                        </div>
                    </div>
                    <div class="col-md-8">
                        <ul class="nav navbar-nav navbar-right">
                         <?php if(!Yii::$app->user->isGuest): ?>
                            <li>
                                <?php echo Html::a(Html::tag('i', '', ['class' => 'fa fa-user']) .' '.Yii::$app->user->identity->username, ['/landing-page/index'], ['class' => 'text-blue', 'title' => Yii::$app->user->identity->username]); ?>
                            </li>
                         <?php endif; ?>

                            <li>
                                <?= Html::a(Html::tag('i', '', ['class' => 'fa fa-filter']) . ' Cari Ulang', ['landing-page/index'], ['class' => 'text-blue', 'title' => 'Cari Ulang']) ?>
                            </li>

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
                                <li>
                                <?php
                                $model = QueryHelper::getAdmin(Yii::$app->user->identity->username);
                                if ($model['item_name']  === 'Admin')
                                {
                                    echo Html::a(Html::tag('i', '', ['class' => 'fa fa-bars']) . ' Kembali Ke Menu', ['/dashboard-admin/'], ['class' => 'text-blue', 'title' => 'Ke Menu Utama']);
                                }else{
                                    echo Html::a(Html::tag('i', '', ['class' => 'fa fa-bars']) . ' Kembali Ke Menu', ['/dashboard/'], ['class' => 'text-blue', 'title' => 'Ke Menu Utama']);
                                }
                                ?>
                                </li>
                                <li>
                                    <?= Html::a(Html::tag('i', '', ['class' => 'fa fa-sign-out']) . ' Logout', ['/auth/logout'], ['class' => 'text-blue', 'title' => 'Logout']) ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <br/>

              <?php foreach ($models as $key => $value) { ?>
                  <div class="col-sm-4 col-xs-6">
                      <br/>
                      <div class="box box-success box-solid">
                          <div class="box-header with-border">
                              <h3 class="box-title"><?= $value->kosan->nama_kosan; ?></h3>
                              <div class="box-tools pull-right">
                                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                              </div>
                              <!-- /.box-tools -->
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                              <span class="info-box-text">Nama Kosan   : <?= $value->kosan->nama_kosan ?></span>
                              <span class="info-box-text">Alamat Kosan : <?= $value->kosan->alamat_kosan ?></span>
                              <span class="info-box-number">Rp. <?= number_format($value->kosan->harga_perbulan) ?>/Bulan</span>
                              <div class="pull-right">
                                  <?= Html::a('Detail',
                                      ['/landing-page/detail', 'id' => $value->kosan->id],
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
   <div style="text-align: center">
    <b>Version</b> 1
    <strong>Copyright © 2019 <a href="javascript:void(0)">Supriatna</a>.</strong> All rights
    reserved.
   </div>



<!--       <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                    <h5 class="description-header">$35,210.43</h5>
                    <span class="description-text">TOTAL REVENUE</span>
                  </div> -->