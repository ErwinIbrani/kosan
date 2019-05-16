<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cron_job".
 *
 * @property int $id_cron_job
 * @property string $controller
 * @property string $action
 * @property int $limit
 * @property int $offset
 * @property int $running
 * @property int $success
 * @property int $started_at
 * @property int $ended_at
 * @property double $last_execution_time
 */
class CronJob extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cron_job';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['controller', 'action', 'running', 'success'], 'required'],
            [['limit', 'offset', 'running', 'success', 'started_at', 'ended_at'], 'integer'],
            [['last_execution_time'], 'number'],
            [['controller', 'action'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cron_job' => 'Id Cron Job',
            'controller' => 'Controller',
            'action' => 'Action',
            'limit' => 'Limit',
            'offset' => 'Offset',
            'running' => 'Running',
            'success' => 'Success',
            'started_at' => 'Started At',
            'ended_at' => 'Ended At',
            'last_execution_time' => 'Last Execution Time',
        ];
    }
}
