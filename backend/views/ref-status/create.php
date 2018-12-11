<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RefStatus */

$this->title = 'Create Ref Status';
$this->params['breadcrumbs'][] = ['label' => 'Ref Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
