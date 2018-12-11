<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Booking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pemesan')->textInput() ?>

    <?= $form->field($model, "id_lapangan")->widget(Select2::classname(), [
        'data' => $data,
        'options' => ['placeholder' => 'Pilih Lapangan'],
        'pluginOptions' => [
        'allowClear' => true
        ],
    ])->label('Lapangan') ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_hp')->textInput(['maxlength' => true]) ?>

    <!-- < $form->field($model, 'tanggal_main')->textInput() ?> -->

    <?= $form->field($model, 'tanggal_main')
         	->widget(DatePicker::classname(), [
 		    'options' => ['placeholder' => date('Y-m-d H:i')],
 	    	'removeButton' => false,
 		    'pluginOptions' => [
 		        'autoclose'=>true,
 		        'todayHighlight' => true,
 		        'calendarWeeks' => true,
 		        'format' => 'yyyy-mm-dd'
 		    ]
 		]); ?>
    <?= $form->field($model, 'waktu_mulai')->textInput() ?>

    <?= $form->field($model, 'waktu_selesai')->textInput() ?>
<!--
    < $form->field($model, 'bukti_transfer')->textInput(['maxlength' => true]) ?>

    < $form->field($model, 'no_rek_transfer')->textInput(['maxlength' => true]) ?>

    < $form->field($model, 'nama_rek_transfer')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
