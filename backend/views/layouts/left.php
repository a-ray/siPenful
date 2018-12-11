<?php

  use mdm\admin\components\MenuHelper;
  use yii\bootstrap\Nav;

?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/avatar5.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
              <p><?= (!Yii::$app->user->isGuest) ? Yii::$app->user->identity->username : 'siPenful' ?></p>
              <?php if(!Yii::$app->user->isGuest) echo '<a href="#"><i class="fa fa-circle text-success"></i> Online</a>' ?>
            </div>
        </div>

        <!-- <= Nav::widget([
              'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id)
        ]); ?> -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Booking', 'icon' => 'file-code-o', 'url' => ['/booking']],
                    ['label' => 'Lapangan', 'icon' => 'dashboard', 'url' => ['/lapangan']],
                    ['label' => 'Harga', 'icon' => 'dashboard', 'url' => ['/ref-harga']],
                    ['label' => 'Sesi Waktu', 'icon' => 'dashboard', 'url' => ['/sesi-waktu']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
