<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SesiWaktu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sesi-waktu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sesi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mulai')->textInput() ?>

    <?= $form->field($model, 'selesai')->textInput() ?>

    <?= $form->field($model, 'tampil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_harga')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
