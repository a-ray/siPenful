<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Booking;



class UploadBuktiForm extends Model{

  public $no_rek;
  public $nama_rek;
  public $bukti;

  public $status;

  private $booking;

  public function rules(){
    // return [
    //   [['id_lapangan', 'nama', 'no_hp',  'sesi_waktu', 'tanggal_main'], 'required'],
    //   [['id_pemesan', 'id_lapangan', 'status'], 'integer'],
    //   [['tanggal_main', 'waktu_mulai', 'waktu_selesai'], 'safe'],
    //   [['nama'], 'string', 'max' => 100],
    //   [['no_hp'], 'string', 'max' => 16],
    //   [['id_lapangan'], 'exist', 'skipOnError' => true, 'targetClass' => Lapangan::className(), 'targetAttribute' => ['id_lapangan' => 'id']],
    //   [['status'], 'exist', 'skipOnError' => true, 'targetClass' => RefStatus::className(), 'targetAttribute' => ['status' => 'id']],
    //   [['id_pemesan'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_pemesan' => 'id']],
    // ];
  }

}


?>
