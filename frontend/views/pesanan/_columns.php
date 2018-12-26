<?php

use yii\helpers\Url;
use yii\helpers\Html;

return [
   ['class' => 'kartik\grid\SerialColumn'],

   // 'id',
   // 'id_pemesan',
   [
     'attribute' => 'lapangan.nama',
     'header' => 'Lapangan',
     'headerOptions' => ['style' => 'color:#337ab7'],
   ],
   'nama',
   'no_hp',
   'tanggal_main',
   [
     'headerOptions' => ['style' => 'color:#337ab7'],
     'header' => 'Jam Main',
     'attribute'=>'waktu_mulai',
     'value' => function ($model) {
             return date('H:i:s', strtotime($model->waktu_mulai)). ' - '. date('H:i:s', strtotime($model->waktu_selesai));
      }
   ],
   //'waktu_selesai',
   //'bukti_transfer',
   //'no_rek_transfer',
   //'nama_rek_transfer',
   //'created_at',
   //'updated_at',
   [
     'width' => '30px',
     'attribute' => 'status0.status_pemesanan',
     'header' => 'Status',
     'headerOptions' => ['style' => 'color:#337ab7'],
   ],

   // ['class' => 'kartik\grid\ActionColumn'],``
   [
       'class' => 'kartik\grid\ActionColumn',
       'width' => '30px',
       'header' => 'Actions',
       'headerOptions' => ['style' => 'color:#337ab7'],
       'template' => '{upload-bukti}',
       'buttons' => [
           'view' => function ($url, $model) {
               return Html::a('Lihat', $url, [
                           'class' => 'btn btn-primary',
                           'title' => 'Lihat',
                           'data-method' => 'POST',
                           'data-params' => ['id' => $model->id],
               ]);
           },
           'upload-bukti' => function ($url, $model) {
               if ($model->status == 1) {
                   return Html::a('Upload Bukti', $url, [
                               'class' => 'btn btn-success',
                               'style' => 'width: 110px',
                               'title' => 'Upload Bukti',
                               'data-method' => 'POST',
                               'data-params' => ['id' => $model->id],
                   ]);
               }
               if($model->status == 2 ){
                 return Html::a('Menunggu', $url, [
                             'class' => 'btn btn-warning disabled',
                             'style' => 'width: 110px',
                             'title' => 'Menunggu',
                 ]);
               }
               return Html::a('Booked', $url, [
                           'class' => 'btn btn-danger disabled',
                           'style' => 'width: 110px',
                           'title' => 'Booked',
               ]);
           }
       ],
       'urlCreator' => function ($action, $model, $key, $index) {
           if ($action === 'view') {
               $url = ['view', 'id' => $model->id];
               return $url;
           }
           if ($action === 'upload-bukti') {
               $url = ['upload-bukti', 'id' => $model->id];
               return $url;
           }
       }
   ],
];

?>
