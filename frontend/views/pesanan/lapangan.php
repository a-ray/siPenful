<?php
/**
 * @link http://www.a-ray.github.io/
 * @author {{author}} <khori.qq@gmail.com>
 * @License: MIT
 */

use kartik\widgets\DatePicker;

use yii\helpers\Html;
use common\components\Helpers;
use johnitvn\ajaxcrud\CrudAsset;

use yii\bootstrap\Modal;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Jadwal';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>



<div class="lapangan">

  <div class="col-sm-4">

        <p>
            <?= Html::a('Pesan', ['pesan'], ['class' => 'btn btn-success']) ?>
        </p>

        <p>
            <?= Html::a('Hari ini', ['lapangan','hari' => date('Y-m-d')], ['class' => 'btn btn-warning']) ?>
            <?= Html::a('Cek Besok', ['lapangan','hari' => date('Y-m-d', strtotime('+1 day'))], ['class' => 'btn btn-info']); ?>
        </p>
  <!-- <hp
      echo '<label class="control-label">Tanggal</label>';
      $hari =  DatePicker::widget([
         'name' => 'Tanggal[allocation_datetime]',
         'value' => date('d-m-Y'),
         'type' => 1,
         'pluginOptions' => [
             'format' => 'dd-mm-yyyy',
             'todayHighlight' => true,
             'class' => 'form-control',
         ],
     ]);
     echo $hari;

     echo Html::a('Cek', ['pesanan/lapangan', 'hari' => date('d-m-Y', strtotime($hari))], [
        'class' => 'btn btn-sm btn-primary',
        // 'role' => 'modal-remote',
        'style' => 'width: 150px',
        'data-toggle' => 'tooltip',
    ]);
  ?> -->
  <!-- <
     $cek = DatePicker::widget([
       'name' => 'tanggal',
       'value' => date('d-m-Y'),
       'pluginOptions' => [
           // 'autoclose'=>true,
           'format' => 'dd-mm-yyyy'
       ],
    ]);
     echo $cek;
     $hari = date('Y-m-d');

     // Yii::$app->helpers->print($hari);exit;

     Html::a('Tambah hari', ['pesanan/lapangan', 'hari' => $hari], [
        'class' => 'btn btn-sm btn-primary',
        // 'role' => 'modal-remote',
        'style' => 'width: 150px',
        'data-toggle' => 'tooltip',
    ]);
  ?>-->
  </div>
  <br>
  <br>
  <br>
  <br>
    <?php Pjax::begin(); ?>

          <div class="table-responsive col-sm-12">
              <table border="1" class="table table-sm table-bordered">
                <thead class="thead-dark">
                  <tr align="center" >
                      <!-- <td>HARI</td> -->
                      <td>SESI</td>
                      <td>WAKTU</td>
                      <?php
                          foreach ($lapangan as $result) {
                              echo "<td valign='middle'>";
                              echo $result->nama;
                              echo "</td>";
                          }
                        ?>
                    </tr>
                    </thead>
                      <tbody>
                    <?php
                    //   $pendaftar = Yii::$app->helpers->getPendaftar(Yii::$app->user->identity->nim,
                    //   Yii::$app->getRequest()->getQueryParam('idPengumuman')
                    // );
                      // $cekJenjang = JenjangPengumuman::cekJenjangPengumuman($mahasiswa->NIM,Yii::$app->getRequest()->getQueryParam('idPengumuman'));
                      // if($cekJenjang['status']) {
                        // foreach ($hari as  $result) {
                        //   echo "<tr>";
                        //   echo "<td rowspan='".sizeof($sesi)."' align='center'>";
                        //   echo $result->NAMA_HARI;
                        //   echo "</td>";
                          foreach ($sesi as $result) {
                              echo "<td align='center' valign='middle'>";
                              echo $result->sesi;
                              echo "</td>";
                              echo "<td align='center' valign='middle'>";
                              echo $result->mulai.' - '.$result->selesai;
                              echo "</td>";
                              foreach ($lapangan as $result2) {
                                  echo "<td align='center'>";
                                  echo Yii::$app->helpers->getLapangan($result2, $hari, $result);
                                  // echo Yii::$app->helpers->
                                  //   CekKelas($result3->ID_RUANG, $result->ID_HARI, $result2->ID_SESI,
                                  //   $pendaftar
                                  //   , Yii::$app->getRequest()->getQueryParam('idPengumuman'));
                                  echo "</td>";
                              }
                              echo "</tr>";
                          }
                        // }
                      // }
                    ?>
                     </tbody>
              </table>
          </div>
            </div>
        </div>
    <?php Pjax::end(); ?>

</div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>

<!-- <a class="btn btn-info validate-click" value="<yii\helpers\Url::to(['sites/data-kategori']) ?>">Info Kategori</a> -->
