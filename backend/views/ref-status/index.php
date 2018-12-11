<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RefStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ref Statuses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-status-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ref Status', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'status_pemesanan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
