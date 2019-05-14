<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserKosan;
use Yii;
/**
 * UserKosanSearch represents the model behind the search form of `app\models\UserKosan`.
 */
class UserKosanSearch extends UserKosan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'kosan_id'], 'integer'],
            [['tgl_masuk_kos', 'tgl_berakhir_kos', 'status', 'status_bayar', 'periode_kosan', 'status_konfirmasi', 'bukti_pembayaran', 'status_cron_job'], 'safe'],
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
        $query = UserKosan::find();

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
            'tgl_masuk_kos' => $this->tgl_masuk_kos,
            'tgl_berakhir_kos' => $this->tgl_berakhir_kos,
            'periode_kosan' => $this->periode_kosan,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
              ->andFilterWhere(['like', 'status_bayar', $this->status_bayar])
              ->andFilterWhere(['like', 'status_konfirmasi', $this->status_konfirmasi]);

        return $dataProvider;
    }
    


        public function kosanUser($params)
    {
        $query = UserKosan::find()
                ->joinWith('kosan', true)
                ->joinWith('user', true)
                ->where(['user.id' => Yii::$app->user->identity->id, 'status_cron_job' => 'Dieksekusi']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => false,
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
            'tgl_masuk_kos' => $this->tgl_masuk_kos,
            'tgl_berakhir_kos' => $this->tgl_berakhir_kos,
            'periode_kosan' => $this->periode_kosan,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
              ->andFilterWhere(['like', 'status_bayar', $this->status_bayar])
              ->andFilterWhere(['like', 'status_konfirmasi', $this->status_konfirmasi]);

        return $dataProvider;
    }

}
