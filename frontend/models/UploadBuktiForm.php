<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Booking;



class UploadBuktiForm extends Model{

  public $no_rek_transfer;
  public $nama_rek_transfer;
  public $bukti_transfer;

  private $_booking;

  public function rules(){
    return [
      [['bukti_transfer', 'no_rek_transfer', 'nama_rek_transfer'], 'required'],
      [['no_rek_transfer', 'nama_rek_transfer'], 'string', 'max' => 128],
      [['bukti_transfer'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png, jpeg, gif', 'maxSize' => 2048000, 'tooBig' => 'Foto maksimal berukuran 2 MB'],
    ];
  }

  public function konfirmasi($id){
    if (!$this->validate()) {
      return null;
    }

    $booking = $this->getBooking($id);

    // echo "<pre>";print_r($user);exit();

    $random  = Yii::$app->security->generateRandomString();


    $booking->no_rek_transfer   = $this->no_rek_transfer;
    $booking->nama_rek_transfer = $this->nama_rek_transfer;
    // if($booking->status==1){
    //   echo "<pre>";print_r($booking);exit();
    //   // echo "hai";
    //   $booking->statusBayar();
    // }

    $booking->setIp();

    if ($booking->bukti_transfer !== null) {
        unlink('img/bukti/' . $booking->bukti_transfer);
    }
    $booking->bukti_transfer = 'bukti_' . $booking->nama . '_' . $random . '.' . $this->bukti_transfer->extension;

    $this->bukti_transfer->saveAs('img/bukti/' . 'bukti_' . $booking->nama . '_' . $random . '.' . $this->bukti_transfer->extension);


    return $booking->save() ? $booking : null;
  }

  protected function getBooking($id)
   {
       if ($this->_booking === null) {
           $this->_booking = Booking::findOne($id);
       }

       return $this->_booking;
   }
}


?>
