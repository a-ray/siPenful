<?php

use kartik\form\ActiveForm;

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
$this->title = 'Validasi pesanan';

?>
<div class="validate-view">
  <?php $form = ActiveForm::begin(); ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nama',
            'no_hp',
            // 'bukti_transfer',
            [
                'label'=>'Bukti Transfer',
                'attribute'=>'bukti_transfer',
                'value' => Yii::getAlias('@sipenful/'. $model->bukti_transfer),
                'format' => ['image'],
            ],

        ],
    ]) ?>
    <div class="form-group">
        <?= Html::submitButton('Validate', ['class' => 'btn btn-success']) ?>
    </div>
    <?php $form = ActiveForm::end(); ?>

</div>
