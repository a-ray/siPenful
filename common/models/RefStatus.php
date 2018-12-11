<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ref_status".
 *
 * @property int $id
 * @property string $status_pemesanan
 *
 * @property Booking[] $bookings
 */
class RefStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_pemesanan'], 'required'],
            [['status_pemesanan'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_pemesanan' => 'Status Pemesanan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::className(), ['status' => 'id']);
    }
}
