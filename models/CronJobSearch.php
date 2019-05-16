<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CronJob;

/**
 * CronJobSearch represents the model behind the search form of `app\models\CronJob`.
 */
class CronJobSearch extends CronJob
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cron_job', 'limit', 'offset', 'running', 'success', 'started_at', 'ended_at'], 'integer'],
            [['controller', 'action'], 'safe'],
            [['last_execution_time'], 'number'],
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
        $query = CronJob::find();

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
            'id_cron_job' => $this->id_cron_job,
            'limit' => $this->limit,
            'offset' => $this->offset,
            'running' => $this->running,
            'success' => $this->success,
            'started_at' => $this->started_at,
            'ended_at' => $this->ended_at,
            'last_execution_time' => $this->last_execution_time,
        ]);

        $query->andFilterWhere(['like', 'controller', $this->controller])
            ->andFilterWhere(['like', 'action', $this->action]);

        return $dataProvider;
    }
}
