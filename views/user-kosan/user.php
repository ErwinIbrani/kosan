<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FactorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Kost';
$this->params['breadcrumbs'][] = $this->title;
?>


           <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>No Telepon</th>
                            <th>Detail</th>
                        </tr>
                        <?php
                        $no = 1;
                        foreach ($queryModels as $key => $queryModel){ ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $queryModel->user->nama_lengkap ?></td>
                                <td><?= $queryModel->user->no_telepon ?></td>
                                <td>
                                    <?= \yii\helpers\Html::a('<i class="fa fa-arrow-circle-right"></i> Lihat Detail',['/user/view', 'id' =>$queryModel->user->id], ['class' => 'small-box-footer']) ?>
                                </td>
                            </tr>
                        <?php }
                        ?>
                        </tbody>
                    </table>
                  </div>
               </div>
            </div>
           </div>
