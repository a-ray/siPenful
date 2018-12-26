<?php
/**
 * @link http://www.a-ray.github.io/
 * @author {{author}} <khori.qq@gmail.com>
 * @License: MIT
 */



use yii\helpers\Html;

use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;

use yii\bootstrap\Modal;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pemesanan';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="booking-index">

    <?php Pjax::begin(); ?>

          <div class="table-responsive">
              <table border="1" class="table table-sm table-bordered">
                <thead class="thead-dark">
                  <tr align="center" >
                      <td>HARI</td>
                      <td>SESI</td>
                      <td>WAKTU</td>
                      <?php
                          foreach($ruang as $result){
                            echo "<td>";
                            echo $result->NAMA_RUANG;
                            echo "</td>";
                          }
                        ?>
                    </tr>
                    </thead>
                      <tbody>
                    <?php
                      $pendaftar = Yii::$app->helpers->getPendaftar(Yii::$app->user->identity->nim,
                      Yii::$app->getRequest()->getQueryParam('idPengumuman')
                    );
                      $cekJenjang = JenjangPengumuman::cekJenjangPengumuman($mahasiswa->NIM,Yii::$app->getRequest()->getQueryParam('idPengumuman'));
                      if($cekJenjang['status']) {
                        foreach ($hari as  $result) {
                          echo "<tr>";
                          echo "<td rowspan='".sizeof($sesi)."' align='center'>";
                          echo $result->NAMA_HARI;
                          echo "</td>";
                          foreach ($sesi as $result2) {
                            echo "<td align='center'>";
                            echo $result2->ID_SESI;
                            echo "</td>";
                            echo "<td align='center'>";
                            echo $result2->SESI_MULAI.' - '.$result2->SESI_SELESAI;
                            echo "</td>";
                            foreach ($ruang as $result3) {
                              echo "<td align='center'>";
                              echo Yii::$app->helpers->
                                CekKelas($result3->ID_RUANG, $result->ID_HARI, $result2->ID_SESI,
                                $pendaftar
                                , Yii::$app->getRequest()->getQueryParam('idPengumuman'));
                              echo "</td>";
                            }
                            echo "</tr>";
                          }
                        }
                      }
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
