<?php

use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\Customer */
$this->title = 'Validasi pesanan';

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
                'format' => ['image', ['width' => '200px', 'height' => 'auto']],
            ],

        ],
    ]) ?>

</div>
