<?php
namespace common\components;
use Yii;
use common\models\Booking;
use common\models\Lapangan;
use common\models\SesiWaktu;

use yii\base\Component;

use yii\helpers\Html;

class Helpers extends Component{

  private $lapangan;
  public function print($data){
    echo "<pre>";print_r($data);
  }

  public function getLapangan($lapangan, $hari, $sesi){

    $resLapangan = Lapangan::find()->select('id')->where(['id' => $lapangan])->all();
    // $this->print($hari);
    // $this->print($sesi);
    $waktu_main = $hari . $sesi->mulai;
    $jam = date('Y-m-d H:i:s', strtotime($waktu_main));
    // $this->print(date('Y-m-d H:i:s', strtotime($sesi->mulai)));
    // $this->print($lapangan->id);
    // exit;
    // $booking = Booking::find()->select('*')->where(['id_lapangan' => '1', 'tanggal_main' => date('Y-m-d', strtotime('2018-12-27')), 'waktu_mulai' => date('Y-m-d H:i:s', strtotime('2018-12-27 23:00:00'))])->all();
    $booking = Booking::find()->select('*')->where(['id_lapangan' => $lapangan->id, 'tanggal_main' => $hari, 'waktu_mulai' => $jam])->all();
    if($booking!=null){
      return '<a class="btn btn-danger disabled">Sudah Dipesan</a>';


    }
    // $this->lapangan = Lapangan::find()->select('*')->all();
    // $this->print($booking);
    // $this->hari = date('d-m-Y', strtotime('+7 hour'));
    // $this->sesi = SesiWaktu::find()->select('*')->all();

    // echo "<pre>";print_r($booking);exit;
  }
}
