<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PengelolaKosan;

/**
 * PengelolaKosanSearch represents the model behind the search form of `app\models\PengelolaKosan`.
 */
class PengelolaKosanSearch extends PengelolaKosan
{
    public $nama_lengkap;
    public $nama_kosan;
    public $lokasi_kosan;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_lengkap', 'nama_kosan', 'lokasi_kosan'], 'safe'],
            [['id', 'user_id', 'kosan_id'], 'integer'],
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
        $query = PengelolaKosan::find()
            ->innerJoinWith('user', true)
            ->innerJoinWith('kosan', true);

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
            'user_id' => $this->user_id,
            'kosan_id' => $this->kosan_id,
        ]);

        $query->andFilterWhere(['like', 'user.nama_lengkap', $this->nama_lengkap])
            ->andFilterWhere(['like', 'kosan.alamat_kosan', $this->lokasi_kosan])
              ->andFilterWhere(['like', 'kosan.nama_kosan', $this->nama_kosan]);

        return $dataProvider;
    }
}
