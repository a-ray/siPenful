<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Lapangan */

$this->title = 'Create Lapangan';
$this->params['breadcrumbs'][] = ['label' => 'Lapangans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lapangan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
