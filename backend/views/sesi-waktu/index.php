<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SesiWaktuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sesi Waktu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sesi-waktu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Sesi Waktu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'sesi',
            'mulai',
            'selesai',
            'tampil',
            'harga.harga',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
