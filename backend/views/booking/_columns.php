<?php
use yii\helpers\Url;
use yii\helpers\Html;

return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class'=>'kartik\grid\DataColumn',
        'label' => 'Lapangan',
        'attribute'=>'lapangan.nama',
    ],
    [
        'class'=>'kartik\grid\DataColumn',
        'attribute'=>'nama',
    ],
    [
        'class'=>'kartik\grid\DataColumn',
        'attribute'=>'no_hp',
    ],
    [
        'class'=>'kartik\grid\DataColumn',
        'attribute'=>'tanggal_main',
        'value' => function ($model) {
          if ($model->tanggal_main == 0000-00-00) {
            return "Belum";
            // code
          }
                return date('d-m-Y', strtotime($model->tanggal_main));
         }
    ],
    [
        'class'=>'kartik\grid\DataColumn',
        'attribute'=>'waktu_mulai',
        'value' => function ($model) {
                return date('H:i:s', strtotime($model->waktu_mulai));
         }
    ],
    [
        'class'=>'kartik\grid\DataColumn',
        'attribute'=>'waktu_selesai',
        'value' => function ($model) {
                return date('H:i:s', strtotime($model->waktu_selesai));
         }
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action,'id'=>$key]);
        },
        'template'=>'{view} {validasi}',
        'buttons' => [
            'validasi' => function ($url, $model) {
              if($model->status == 2 ){
                return Html::a('Validasi Pembayaran', ['booking/validasi', 'id' => $model->id], [
                    'class' => 'btn btn-sm btn-primary validate-click',
                    // 'role' => 'modal-remote',
                    'style' => 'width: 150px',
                    'title' => 'Validasi Pembayaran',
                    'data-toggle' => 'tooltip',
                ]);
              }
              return Html::a($model->status0['status_pemesanan'], ['booking/validasi', 'id' => $model->id], [
                  'class' => 'btn btn-sm btn-danger disabled',
                  // 'role' => 'modal-remote',
                  'style' => [
                    'width'=> '150px',
                    'cursor' => 'not-allowed',
                    'pointer-events' => 'none !important',
                  ],
                  'title' => 'status',
                  'data-toggle' => 'tooltip',
              ]);
            },
        ],
        'viewOptions' => [
          'role'=>'modal-remote',
          'class' => 'btn btn-sm btn-success',
          'title'=>'View',
          'data-toggle'=>'tooltip'
        ],
        // 'confirmOptions' => [
        //   'role' => 'modal-remote',
        //   'class' => 'btn btn-sm btn-warning',
        //   'title' => 'Confirm Pembayaran',
        //   'data-toogle' => 'tooltip'
        // ],
        // 'updateOptions'=>[
        //   'role'=>'modal-remote',
        //   'class' => 'btn btn-sm btn-primary',
        //   'title'=>'Update',
        //   'data-toggle'=>'tooltip'
        // ],
        // 'deleteOptions'=>[
        //   'role'=>'modal-remote','title'=>'Delete',
        //   'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
        //   'class' => 'btn btn-sm btn-danger',
        //   'data-request-method'=>'post',
        //   'data-toggle'=>'tooltip',
        //   'data-confirm-title'=>'Are you sure?',
        //   'data-confirm-message'=>'Are you sure want to delete this item'
        // ],
    ],

];
