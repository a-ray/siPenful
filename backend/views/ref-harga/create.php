<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RefHarga */

$this->title = 'Harga';
$this->params['breadcrumbs'][] = ['label' => 'Hargas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-harga-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
