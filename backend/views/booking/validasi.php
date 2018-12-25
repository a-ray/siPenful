<?php

use kartik\form\ActiveForm;

use kartik\widgets\SwitchInput;

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $model app\models\Customer */
$this->title = 'Validasi pesanan';

$js = <<<js
$('.validate-click').click(function () {
     $('#validate-modal')
         .modal('show')
         .find('#validateModalContent')
         .load($(this).attr('value'));
 });
js;

$this->registerJs($js);

?>


<?php
  Modal::begin([
      'header'=>'<h4>Validasi Pemesanan</h4>',
      'id'=>'validate-modal',
      'size'=>'modal-lg'
  ]);

  echo "<div id='validateModalContent'></div>";

  Modal::end();
?>

<div class="validate-view">


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

<?php  ActiveForm::begin([
    'id' => 'validasi-form',
]) ?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary'], ['name'=>'submit']) ?>
        </div>
    </div>
    <?php ActiveForm::end() ?>

    <div class="form-group">
      <?= Html::a('Validate',['booking/validasi', 'id' => $model->id] ,
        ['class'=>'btn btn-success']
      )?>

    </div>

</div>
