<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FactorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Management kosan';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
 <div class="box-header with-border">
   <div class="box-title">
   <?= Html::a('Tambah Kosan', ['create'], ['class' => 'btn btn-success']) ?>
   <?php
      $columns = [
         ['class' => 'kartik\grid\SerialColumn'],
            //'id',
            [
              'attribute' => 'nama_kosan',
              'label'     => 'Nama Kosan',
              'hAlign'    => 'left',  
              'vAlign'    => 'middle',
              'contentOptions' => ['style' => 'width:180px;'],
            ],
            [
              'attribute' => 'jumlah_kamar',
              'label'     => 'Jumlah Kamar Saat Ini',
              'hAlign'    => 'left',  
              'vAlign'    => 'middle',
              'contentOptions' => ['style' => 'width:180px;'],
            ],

             [
              'attribute' => 'harga_perbulan',
              'label'     => 'Harga Perbulan',
              'format'    => 'Currency',
              'hAlign'    => 'left',  
              'vAlign'    => 'middle',
              'contentOptions' => ['style' => 'width:180px;'],
            ],


            [
              'attribute' => 'jenis_kosan',
              'label'     => 'Jenis Kosan',
              'filter'    => ['Pria' => 'Pria', 'Wanita' => 'Wanita', 'Campur' => 'Campur'],
              'hAlign'    => 'left',  
              'vAlign'    => 'middle',
              'contentOptions' => ['style' => 'width:180px;'],
            ],



           
          ['class' => 'kartik\grid\ActionColumn'],
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
              '{toggleData}',
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