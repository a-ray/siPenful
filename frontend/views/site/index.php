<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = Html::encode(Yii::$app->name);
?>
<div class="site-index">

    <div class="jumbotron">
      <h1><strong>SiPENFUL</strong></h1>

        <object type="image/svg+xml" data="/img/football-player-setting-ball.svg" width="auto" height="30%">
          Your browser does not support SVG
        </object>
      
        <p class="lead">Sistem Informasi Penyewaan Lapangan Futsal</p>

        <p><?= Html::a('PESAN SEKARANG', ['/pesanan'], ['class' => 'btn btn-lg btn-success']) ?></p>
    </div>

</div>
