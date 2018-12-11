<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ref_harga".
 *
 * @property int $id
 * @property int $harga
 *
 * @property SesiWaktu[] $sesiWaktus
 */
class RefHarga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_harga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['harga'], 'required'],
            [['harga'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'harga' => 'Harga',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSesiWaktus()
    {
        return $this->hasMany(SesiWaktu::className(), ['id_harga' => 'id']);
    }
}
