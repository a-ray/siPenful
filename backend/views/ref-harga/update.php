<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RefHarga */

$this->title = 'Update Ref Harga: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Hargas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ref-harga-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
