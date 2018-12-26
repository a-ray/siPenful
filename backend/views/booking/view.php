<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Booking */

$this->title = 'Booking #'. $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-view">

    <h1>Detail</h1>

    <!-- <p>
        <= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        ?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p> -->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // 'id_pemesan',
            [
              'label' => 'Lapangan',
              'attribute'=> 'lapangan.nama',
            ],

            'nama',
            'no_hp',
            [
                'class'=>'kartik\grid\DataColumn',
                'attribute'=>'tanggal_main',
                'value' => function ($model) {
                  if ($model->tanggal_main == 0000-00-00) {
                    return "Belum terisi";
                    // code
                  }
                        return date('d-m-Y', strtotime($model->tanggal_main));
                 }
            ],
            [
                'class'=>'kartik\grid\DataColumn',
                'label' => 'Mulai Main',
                'attribute'=>'waktu_mulai',
                'value' => function ($model) {
                        return date('H:i:s', strtotime($model->waktu_mulai));
                 }
            ],
            [
                'class'=>'kartik\grid\DataColumn',
                'label' => 'Selesai Main',
                'attribute'=>'waktu_selesai',
                'value' => function ($model) {
                        return date('H:i:s', strtotime($model->waktu_selesai));
                 }
            ],
            [
                'label'=>'Bukti Transfer',
                'attribute'=>'bukti_transfer',
                'value' => Yii::getAlias('@sipenful/'. $model->bukti_transfer),
                'format' => ['image', ['width' => '300px', 'height' => 'auto']],
            ],
            'no_rek_transfer',
            'nama_rek_transfer',
            // 'created_at',
            // 'updated_at',
            'status0.status_pemesanan',
            'ip',
        ],
    ]) ?>


</div>
