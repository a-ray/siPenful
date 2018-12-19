<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Booking;
use common\models\SesiWaktu;
use common\models\Lapangan;
use common\models\RefStatus;
use common\models\User;

class PesananForm extends Model
{
    public $tanggal;
    public $id_lapangan;
    public $id_pemesan;
    public $tanggal_main;
    public $sesi_waktu;
    public $no_hp;
    public $nama;
    public $status;

    public function rules()
    {
        return [
          [['id_lapangan',  'sesi_waktu', 'tanggal_main'], 'required'],
          [['id_lapangan'], 'integer'],
          [['tanggal_main'], 'safe'],
          // [['nama'], 'string', 'max' => 100],
          [['no_hp'], 'string', 'max' => 16],
          [['id_lapangan'], 'exist', 'skipOnError' => true, 'targetClass' => Lapangan::className(), 'targetAttribute' => ['id_lapangan' => 'id']],
        ];
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

    public function pesan()
    {
        if (!$this->validate()) {
            return null;
        }

        $sesi = SesiWaktu::find()->where(['id' => $this->sesi_waktu])->one();

        $waktu_mulai = $this->tanggal_main . ' ' . $sesi->mulai;
        $waktu_selesai = $this->tanggal_main. ' ' . $sesi->selesai;

        $lapangan = Booking::find()->where(['id_lapangan' => $this->id_lapangan])
          ->andWhere(['between', 'waktu_selesai', $waktu_mulai, $waktu_selesai])
          ->andWhere(['status' => 1])->andWhere(['status' => 10])
          ->count();

        $hari = date('Y-m-d H:i:s');

        if ($waktu_mulai < $hari) {
            Yii::$app->session->setFlash('error', 'Mohon maaf tanggal tidak sesuai');
        } elseif ($lapangan > 0) {
            Yii::$app->session->setFlash('error', 'Lapangan sudah digunakan');
        } else {
            $booking = new Booking();

            $booking->id_pemesan = Yii::$app->user->identity->id;
            $booking->id_lapangan = $this->id_lapangan;
            $booking->nama = strtoupper(Yii::$app->user->identity->first_name . ' ' . Yii::$app->user->identity->last_name);
            $booking->no_hp = $this->no_hp;
            $booking->waktu_mulai = $waktu_mulai;
            $booking->waktu_selesai = $waktu_selesai;

            $booking->status = 1;

            return $booking->save() ? $booking : null;
        }
    }
}
