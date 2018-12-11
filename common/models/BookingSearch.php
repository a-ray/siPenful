<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Booking;

/**
 * BookingSearch represents the model behind the search form of `common\models\Booking`.
 */
class BookingSearch extends Booking
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_pemesan', 'id_lapangan', 'created_at', 'updated_at', 'status'], 'integer'],
            [['nama', 'no_hp', 'tanggal_main', 'waktu_mulai', 'waktu_selesai', 'bukti_transfer', 'no_rek_transfer', 'nama_rek_transfer'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Booking::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_pemesan' => $this->id_pemesan,
            'id_lapangan' => $this->id_lapangan,
            'tanggal_main' => $this->tanggal_main,
            'waktu_mulai' => $this->waktu_mulai,
            'waktu_selesai' => $this->waktu_selesai,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'no_hp', $this->no_hp])
            ->andFilterWhere(['like', 'bukti_transfer', $this->bukti_transfer])
            ->andFilterWhere(['like', 'no_rek_transfer', $this->no_rek_transfer])
            ->andFilterWhere(['like', 'nama_rek_transfer', $this->nama_rek_transfer]);

        return $dataProvider;
    }
}
