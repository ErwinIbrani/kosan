<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FactorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Management User';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
 <div class="box-header with-border">
   <div class="box-title">
   <?php
      $columns = [
         ['class' => 'kartik\grid\SerialColumn'],
            //'id',
            [
              'attribute' => 'nama_lengkap',
              'label'     => 'Nama Lengkap',
              'hAlign'    => 'left',  
              'vAlign'    => 'middle',
              'contentOptions' => ['style' => 'width:180px;'],
            ],
            [
              'attribute' => 'email',
              'label'     => 'E-Mail',
              'format'    => 'ntext',
              'hAlign'    => 'left',  
              'vAlign'    => 'middle',
              'contentOptions' => ['style' => 'width:180px;'],
            ],

             [
              'attribute' => 'jenis_kelamin',
              'label'     => 'Jenis Kelamin',
              'filter'    => ['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'],
              'format'    => 'ntext',
              'hAlign'    => 'left',  
              'vAlign'    => 'middle',
              'contentOptions' => ['style' => 'width:180px;'],
            ],

            [
              'attribute' => 'no_telepon',
              'label'     => 'No Telepon',
              'format'    => 'ntext',
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
                  'filename' => 'exported-data_user_PDF' . date('Y-m-d_H-i-s'),
                  //'title'    => 'user PDF', 
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
                    'contentBefore' => 'Daftar User Kosan',
                    //'contentAfter'  => 'Telah diterima uang dari PT Aren Mandala Sari pada tanggal ___________________'
                    /*sebesar IDR '.$searchModel->total_price.'*/
                  ]
                ],

             GridView::EXCEL   => [
                    'label'    => 'EXCEL',
                    'filename' => 'exported-data_user_EXCEL' . date('Y-m-d_H-i-s'),
                    //'title'    => 'user EXCEL',                        
                    'options'  => ['title' => 'user List', 'author' => 'Me'], 
                    'config'   => [
                       'cssFile' => ['style' => 'background-color: red;'],
                    ]           
                ],

              GridView::HTML   => [
                    'label'    => 'HTML',
                    'filename' => 'exported-data_user_HTML' . date('Y-m-d_H-i-s'),                            
                ], 

                GridView::JSON   => [
                    'label'    => 'JSON',
                    'filename' => 'exported-data_user_JSON' . date('Y-m-d_H-i-s'),       
                ],  

                 GridView::CSV   => [
                    'label'    => 'CSV',
                    'filename' => 'exported-data_user_CSV' . date('Y-m-d_H-i-s'),            
                ],   

                GridView::TEXT   => [
                    'label'    => 'TEXT',
                    'filename' => 'exported-data_user_TEXT' . date('Y-m-d_H-i-s'),              
                ],

             ],
      ]); 
    ?> 
 </div>
</div>