<?php

use yii\helpers\Html;
use kartik\grid\GridView;

use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pesanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
      <?= Html::a('Pesan', ['pesan'], ['class' => 'btn btn-success']) ?>
      <?= Html::a('Lihat Jadwal', ['lapangan', 'hari' => date('Y-m-d')], ['class' => 'btn btn-info']) ?>
    </p>
    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => require(__DIR__.'/_columns.php'),
    ]); ?>

    <?php Pjax::end(); ?>

</div>
