<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Booking */
/* @var $form ActiveForm */
?>
<div class="booking-upload-bukti">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id_pemesan') ?>
        <?= $form->field($model, 'id_lapangan') ?>
        <?= $form->field($model, 'nama') ?>
        <?= $form->field($model, 'no_hp') ?>
        <?= $form->field($model, 'waktu_mulai') ?>
        <?= $form->field($model, 'waktu_selesai') ?>
        <?= $form->field($model, 'created_at') ?>
        <?= $form->field($model, 'updated_at') ?>
        <?= $form->field($model, 'status') ?>
        <?= $form->field($model, 'tanggal_main') ?>
        <?= $form->field($model, 'bukti_transfer') ?>
        <?= $form->field($model, 'no_rek_transfer') ?>
        <?= $form->field($model, 'nama_rek_transfer') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- booking-upload-bukti -->
