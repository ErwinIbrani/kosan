<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\assets\FancyAsset;
FancyAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel app\models\FactorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'History Pembayaran';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
 <div class="box-header with-border">
   <div class="box-title">
 <!-- Konfirmasi Pembayaran-->
   <?php
      $columns = [
         ['class' => 'kartik\grid\SerialColumn'],

         
            [
              'attribute' => 'nama_user',
              'label'     => 'Nama',
              'hAlign'    => 'left',  
              'vAlign'    => 'middle',
              'content'   => function($model){
                 return $model->user->nama_lengkap;
              },
              'contentOptions' => ['style' => 'width:180px;'],
            ],

            [
              'attribute' => 'nama_kosan',
              'label'     => 'Nama Kosan',
              'hAlign'    => 'left',  
              'vAlign'    => 'middle',
              'content'   => function($model){
                 return $model->kosan->nama_kosan;
              },
              'contentOptions' => ['style' => 'width:180px;'],
            ],

            [
                  'label'    => 'Tanggal Awal Kosan',
                  'format'   => ['date', 'php:Y-m-d'],
                  'filter'   => \yii\jui\DatePicker::widget([
                          'model'     =>$searchModel,
                          'attribute' =>'tgl_masuk_kos',
                          'language'  => 'id',
                          'dateFormat'=> 'yyyy-MM-dd',
                ]),
                'value'    => function($model) {
                  return $model->tgl_masuk_kos;
                },
                'hAlign'   => 'left',
                'vAlign'   => 'middle',
                'contentOptions' => ['style' => 'width:100px;'],
            ],


            [
                  'label'    => 'Tanggal Berakhir Kosan',
                  'format'   => ['date', 'php:Y-m-d'],
                  'filter'   => \yii\jui\DatePicker::widget([
                          'model'     =>$searchModel,
                          'attribute' =>'tgl_berakhir_kos',
                          'language'  => 'id',
                          'dateFormat'=> 'yyyy-MM-dd',
                ]),
                'value'    => function($model) {
                  return $model->tgl_berakhir_kos;
                },
                'hAlign'   => 'left',
                'vAlign'   => 'middle',
                'contentOptions' => ['style' => 'width:100px;'],
            ],

          [
              'attribute' => 'status_bayar',
              'label'     => 'Status Bayar Kosan',
              'hAlign'    => 'left',  
              'vAlign'    => 'middle',
              'filter'    => ['Dibayar' => 'Dibayar', 'Belum Dibayar' => 'Belum Dibayar'],
              'content'   => function($model){
                 return $model->status_bayar;
              },
              
         ],

         [
            'attribute' => 'bukti_pembayaran',
            'label'     => 'Bukti Pembayaran',
            'format'    => 'raw',
            'filter'    => false,
            'value'     => function($model) {
              if(!empty($model->bukti_pembayaran)){
                 return  
                  '<a data-fancybox="gallery" href='.$model->linkpreview.'>
                   '.Html::img($model->linkpreview, 
                   ['alt' => 'example1', 
                    'class'=>'img-thumbnail img-responsive',
                    'style' => 'border: 1px solid #ddd;
                     border-radius: 4px;
                     padding: 5px;
                     width: 100px;'
                   ]).'
                    </a>'; 
               }else{
                return 'Belum Ada';
              }
            },
         ],


      ];
     ?> 
  </div>
</div>
 <div class="box-body">
   <?= GridView::widget([
       'dataProvider' => $dataProvider,
       'filterModel' => $searchModel,
       'columns' => $columns,
       'toolbar' =>  [
              '{export}',
              //'{toggleData}',
          ],
          'toggleDataContainer' => ['class' => 'btn-group mr-2'],
          'export' => [
              'fontAwesome' => true
          ],
          //'showPageSummary' => true,
          'panel' => [
              'type' => GridView::TYPE_PRIMARY,
          ],
        'exportConfig' => [

             GridView::PDF   => [
                  'label'    => 'PDF', 
                  'filename' => 'exported-data_kosan_PDF' . date('Y-m-d_H-i-s'),
                  //'title'    => 'kosan PDF', 
                  'config'   => [
                    // 'methods' => [
                    //   'SetHeader' => [
                    //     ['odd' => $pdfHeader, 'even' => $pdfHeader]
                    //   ],
                    //   'SetFooter' => [
                    //     ['odd' => $pdfFooter, 'even' => $pdfFooter]
                    //   ],
                    // ],
                    /*'options' => [
                      'title' => '',
                      'subject' => 'Preceptors',
                      'keywords' => 'pdf, preceptors, export, other, keywords, here'
                    ],*/
                    'contentBefore' => 'Daftar kosan Kosan',
                    //'contentAfter'  => 'Telah diterima uang dari PT Aren Mandala Sari pada tanggal ___________________'
                    /*sebesar IDR '.$searchModel->total_price.'*/
                  ]
                ],

             GridView::EXCEL   => [
                    'label'    => 'EXCEL',
                    'filename' => 'exported-data_kosan_EXCEL' . date('Y-m-d_H-i-s'),
                    //'title'    => 'kosan EXCEL',                        
                    'options'  => ['title' => 'kosan List', 'author' => 'Me'], 
                    'config'   => [
                       'cssFile' => ['style' => 'background-color: red;'],
                    ]           
                ],

              GridView::HTML   => [
                    'label'    => 'HTML',
                    'filename' => 'exported-data_kosan_HTML' . date('Y-m-d_H-i-s'),                            
                ], 

                GridView::JSON   => [
                    'label'    => 'JSON',
                    'filename' => 'exported-data_kosan_JSON' . date('Y-m-d_H-i-s'),       
                ],  

                 GridView::CSV   => [
                    'label'    => 'CSV',
                    'filename' => 'exported-data_kosan_CSV' . date('Y-m-d_H-i-s'),            
                ],   

                GridView::TEXT   => [
                    'label'    => 'TEXT',
                    'filename' => 'exported-data_kosan_TEXT' . date('Y-m-d_H-i-s'),              
                ],

             ],
      ]); 
    ?> 
 </div>
</div>