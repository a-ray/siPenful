<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SesiWaktuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sesi-waktu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sesi') ?>

    <?= $form->field($model, 'mulai') ?>

    <?= $form->field($model, 'selesai') ?>

    <?= $form->field($model, 'tampil') ?>

    <?php // echo $form->field($model, 'id_harga') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
