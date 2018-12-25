<?php
/**
 * @link http://www.a-ray.github.io/
 * @author {{author}} <khori.qq@gmail.com>
 * @License: MIT
 */



use yii\helpers\Html;

use kartik\grid\GridView;

use yii\bootstrap\Modal;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pemesanan';
$this->params['breadcrumbs'][] = $this->title;

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
<div class="booking-index">

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider'=> $dataProvider,
        // 'filterModel' => $searchModel,
        // 'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => 'Belum Ada'],
        'columns' => require(__DIR__.'/_columns.php'),
        'responsive'=>true,
        // 'hover'=>true
    ]); ?>
    <?php Pjax::end(); ?>
</div>


<?php
  Modal::begin([
      'header'=>'<h4>Validasi Pemesanan</h4>',
      'id'=>'validate-modal',
      'size'=>'modal-lg'
  ]);

  echo "<div id='validateModalContent'></div>";

  Modal::end();
?>

<a class="btn btn-info validate-click" value="<yii\helpers\Url::to(['sites/data-kategori']) ?>">Info Kategori</a>
