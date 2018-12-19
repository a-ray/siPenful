<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\FileInput;

$this->title = 'Konfirmasi Pembayaran';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="square">
            <h4 class="text-center">
                FORM KONFIRMASI PEMBAYARAN
            </h4>
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                Mohon isi dengan <a class="alert-link">benar</a> dan <a class="alert-link">teliti</a>.
    		Jika Pembayaran dilakukan melalui Teller isikan field <a class="alert-link">NO. REK. TRANSFER</a> dan <a class="alert-link">NAMA REK. TRANSFER</a> dengan <a class="alert-link">BAYAR DI TELLER</a>
            </div>

            <?php $form = ActiveForm::begin([
                'enableClientValidation' => false,
                'enableAjaxValidation' => false,
                'validateOnChange' => false,
                'validateOnBlur' => false,
                'options' => [
                    'method' => 'post',
                    'enctype' => 'multipart/form-data',
                ],
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                    'horizontalCssClasses' => [
                        'label' => 'col-sm-3 control-label',
                        'offset' => '',
                        'wrapper' => 'col-sm-9',
                        'error' => '',
                        'hint' => '',
                    ],
                ],
            ]); ?>
            <?= $data->created_at ?>
            <?=
            $form->field($model, 'no_rek_transfer')->textInput() .
            $form->field($model, 'nama_rek_transfer')->textInput() .
            $form->field($model, 'bukti_transfer')->widget(FileInput::classname(), [
                'language' => 'id',
                'pluginOptions' => [
                    'showCaption' => true,
                    'showRemove' => true,
                    'showUpload' => false,
                    'browseLabel' => 'Pilih Gambar',
                    'browseClass' => 'btn btn-primary btn-flat',
                    'browseIcon' => '<i class="fa fa-image"></i> ',
                    'removeClass' => 'btn btn-default btn-flat',
                ]
            ]) ?>

            <div align="right">
                <?= Html::submitButton('Kirim', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
