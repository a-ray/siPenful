<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sesi_waktu".
 *
 * @property int $id
 * @property string $sesi
 * @property string $mulai
 * @property string $selesai
 * @property string $tampil
 * @property int $id_harga
 *
 * @property RefHarga $harga
 */
class SesiWaktu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sesi_waktu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sesi', 'mulai', 'selesai', 'tampil', 'id_harga'], 'required'],
            [['mulai', 'selesai'], 'safe'],
            [['id_harga'], 'integer'],
            [['sesi', 'tampil'], 'string', 'max' => 32],
            [['tampil'], 'unique'],
            [['id_harga'], 'exist', 'skipOnError' => true, 'targetClass' => RefHarga::className(), 'targetAttribute' => ['id_harga' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sesi' => 'Sesi',
            'mulai' => 'Mulai',
            'selesai' => 'Selesai',
            'tampil' => 'Tampil',
            'id_harga' => 'Id Harga',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHarga()
    {
        return $this->hasOne(RefHarga::className(), ['id' => 'id_harga']);
    }
}
