<?php
/**
 * @link http://www.a-ray.github.io/
 * @author {{author}} <khori.qq@gmail.com>
 * @License: MIT
 */

use kartik\widgets\DatePicker;

use yii\helpers\Html;

use kartik\grid\GridView;
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
<div class="col-xm-4" width="10px">
<?php
   echo DatePicker::widget([
     'name' => 'birth_date',
     'value' => date('d-m-Y'),
     'pluginOptions' => [
         // 'autoclose'=>true,
         'format' => 'dd-mm-yyyy'
     ]
   ]);
?>
</div>
<br>
<div class="booking-index">

    <?php Pjax::begin(); ?>

          <div class="table-responsive">
              <table border="1" class="table table-sm table-bordered">
                <thead class="thead-dark">
                  <tr align="center" >
                      <!-- <td>HARI</td> -->
                      <td>SESI</td>
                      <td>WAKTU</td>
                      <?php
                          foreach($lapangan as $result){
                            echo "<td>";
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
                            echo "<td align='center'>";
                            echo $result->sesi;
                            echo "</td>";
                            echo "<td align='center'>";
                            echo $result->mulai.' - '.$result->selesai;
                            echo "</td>";
                            foreach ($lapangan as $result) {
                              echo "<td align='center'>";
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


<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>

<!-- <a class="btn btn-info validate-click" value="<yii\helpers\Url::to(['sites/data-kategori']) ?>">Info Kategori</a> -->
