<?php

use yii\helpers\Html;

$label = ['disetujui', 'ditolak', 'menunggu validasi', 'hari ini'];
$status = ['10','5','0','0'];
$color = ['green', 'red', 'yellow', 'aqua'];
// $icon = ['ios-checkmark-outline','ios-personadd','android-warning','ios-information-outline'];
$icon = ['check', 'user-plus', 'exclamation-triangle', 'info-circle'];
$this->title = 'Dashboard Admin';
?>
<div class="site-index">

  <div class="row">
  <?php for($i = 0; $i< 4 ; $i++){ ?>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-<?= $color[$i] ?>">

            <div class="inner">
                <h3><= $data[$i] ?> DATA</h3>
                <p><?= ucwords($label[$i]) ?></p>
            </div>
            <div class="icon">
                <i class="fa fa-<?= $icon[$i]?>"></i>
            </div>

            <?= Html::a('Selengkapnya <i class="fa fa-arrow-circle-right"></i>', ['action-page', 'a' => $i, 'label' => ucwords($label[$i]), 'ProposalSearch[status]' => $status[$i]], ['class' => 'small-box-footer'])?>
        </div>
    </div>
    <?php } ?>
  </div>
</div>
