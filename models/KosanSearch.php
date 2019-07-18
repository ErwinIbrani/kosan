<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kosan;

/**
 * KosanSearch represents the model behind the search form of `app\models\Kosan`.
 */
class KosanSearch extends Kosan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'jumlah_kamar'], 'integer'],
            [['nama_kosan', 'alamat_kosan', 'pasilitas', 'jenis_kosan', 'status', 'gambar_kosan'], 'safe'],
            [['harga_perbulan'], 'number'],
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
        $query = Kosan::find()->where(['id' => 1]);

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
            'jumlah_kamar' => $this->jumlah_kamar,
            'harga_perbulan' => $this->harga_perbulan,
        ]);

        $query->andFilterWhere(['like', 'nama_kosan', $this->nama_kosan])
            ->andFilterWhere(['like', 'alamat_kosan', $this->alamat_kosan])
            ->andFilterWhere(['like', 'pasilitas', $this->pasilitas])
            ->andFilterWhere(['like', 'jenis_kosan', $this->jenis_kosan])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'gambar_kosan', $this->gambar_kosan]);

        return $dataProvider;
    }
}
