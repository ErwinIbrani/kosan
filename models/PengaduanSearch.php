<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pengaduan;
use Yii;

/**
 * PengaduanSearch represents the model behind the search form of `app\models\Pengaduan`.
 */
class PengaduanSearch extends Pengaduan
{
     public $nama_kosan;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'kosan_id'], 'integer'],
            [['jenis_pengaduan', 'keterangan_pengadu', 'foto', 'status', 'keterangan_teknisi', 'tanggal_laporan', 'tanggal_ditangani', 'nama_kosan'], 'safe'],
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
       
        $query = Pengaduan::find()
                ->innerJoinWith('kosan', true)
                ->innerJoinWith('user', true)
                ->where(['user.id' => Yii::$app->user->identity->id]);

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
            'tanggal_laporan' => $this->tanggal_laporan,
            'tanggal_ditangani' => $this->tanggal_ditangani,
        ]);

        $query->andFilterWhere(['like', 'jenis_pengaduan', $this->jenis_pengaduan])
            ->andFilterWhere(['like',  'keterangan_pengadu', $this->keterangan_pengadu])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'kosan.nama_kosan', $this->nama_kosan])
            ->andFilterWhere(['like', 'keterangan_teknisi', $this->keterangan_teknisi]);

        return $dataProvider;
    }
}
