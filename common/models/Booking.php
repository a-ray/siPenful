<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "booking".
 *
 * @property int $id
 * @property int $id_pemesan
 * @property int $id_lapangan
 * @property string $nama
 * @property string $no_hp
 * @property string $tanggal_main
 * @property string $waktu_mulai
 * @property string $waktu_selesai
 * @property string $bukti_transfer
 * @property string $no_rek_transfer
 * @property string $nama_rek_transfer
 * @property int $created_at
 * @property int $updated_at
 * @property int $status
 * @property string $ip
 *
 * @property Lapangan $lapangan
 * @property RefStatus $status0
 * @property User $pemesan
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'booking';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemesan', 'id_lapangan', 'nama', 'no_hp', 'waktu_mulai', 'waktu_selesai'], 'required'],
            [['id_pemesan', 'id_lapangan', 'created_at', 'updated_at', 'status'], 'integer'],
            [['tanggal_main', 'waktu_mulai', 'waktu_selesai'], 'safe'],
            [['nama'], 'string', 'max' => 100],
            [['no_hp'], 'string', 'min' => 10, 'max' => 16],
            [['bukti_transfer', 'no_rek_transfer', 'nama_rek_transfer'], 'string', 'max' => 128],
            [['id_lapangan'], 'exist', 'skipOnError' => true, 'targetClass' => Lapangan::className(), 'targetAttribute' => ['id_lapangan' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => RefStatus::className(), 'targetAttribute' => ['status' => 'id']],
            [['id_pemesan'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_pemesan' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pemesan' => 'Id Pemesan',
            'id_lapangan' => 'Id Lapangan',
            'nama' => 'Nama',
            'no_hp' => 'No Hp',
            'tanggal_main' => 'Tanggal Main',
            'waktu_mulai' => 'Waktu Mulai',
            'waktu_selesai' => 'Waktu Selesai',
            'bukti_transfer' => 'Bukti Transfer',
            'no_rek_transfer' => 'No Rek Transfer',
            'nama_rek_transfer' => 'Nama Rek Transfer',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'ip' => 'IP Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLapangan()
    {
        return $this->hasOne(Lapangan::className(), ['id' => 'id_lapangan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(RefStatus::className(), ['id' => 'status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPemesan()
    {
        return $this->hasOne(User::className(), ['id' => 'id_pemesan']);
    }

    public static function findByPemesan($id_pemesan)
    {
        return static::findOne(['id_pemesan' => $id_pemesan]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function setIp()
    {
        return $this->ip = Yii::$app->request->userIP;
    }

    public function statusBayar(){
      return $this->status = 2;
    }

    public function statusValid(){
      return $this->status = 10;
    }
}
