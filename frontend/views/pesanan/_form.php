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

    <!-- <div class="col-md-4 col-sm-4 col-xs-12"> -->
    <?= $form->field($model, 'nama')->textInput([
      'value' => strtoupper(Yii::$app->user->identity->first_name . ' ' . Yii::$app->user->identity->last_name),
      'disabled' => true,
      'readOnly' => true,
    ]) ?>
    <!-- </div> -->

    <?= $form->field($model, 'no_hp')->textInput(['value' => Yii::$app->user->identity->no_hp])     ?>


    <?= $form->field($model, "id_lapangan")->widget(Select2::classname(), [
        'data' => $data,
        'options' => ['placeholder' => 'Pilih Lapangan'],
        'pluginOptions' => [
        'allowClear' => true
        ],
    ])->label('Lapangan') ?>


    <!-- < $form->field($model, 'tanggal_main')->textInput() ?> -->

    <?= $form->field($model, 'tanggal_main')
             ->widget(DatePicker::classname(), [
            'options' => ['value' => date('Y-m-d', strtotime('+7 hour'))],
            'removeButton' => false,
            'pluginOptions' => [
                'autoclose'=>true,
                'todayHighlight' => false,
                'calendarWeeks' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]); ?>


    <?= $form->field($model, "sesi_waktu")->widget(Select2::classname(), [
        'data' => $sesi,
        'options' => ['placeholder' => 'Pilih Waktu Main'],
        'pluginOptions' => [
        'allowClear' => true
        ],
    ])->label('Sesi') ?>




    <div class="form-group">
        <?= Html::submitButton('Pesan!', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
