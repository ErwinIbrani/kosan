<?php
namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use fedemotta\cronjob\models\CronJob;
use app\models\UserKosan;
use Yii;


class PemberitahuanController extends Controller
{

     /**
     * Run SomeModel::some_method for a period of time
     * @param string $from
     * @param string $to
     * @return int exit code
     */
    public function actionInit($from, $to)
    {
        $dates   = CronJob::getDateRange($from, $to);
        $command = CronJob::run($this->id, $this->action->id, 0, CronJob::countDateRange($dates));
        if ($command === false){
            return Controller::EXIT_CODE_ERROR;
        }else{
            foreach ($dates as $date) {
                //this is the function to execute for each day
               UserKosan::kirim_pemberitahuan((string) $date);
            }
            $command->finish();
            return Controller::EXIT_CODE_NORMAL;
        }
    }

     /**
     * Run SomeModel::kirim_pemberitahuan for today only as the default action
     * @return int exit code
     */
    public function actionTujuhHari()
    {
        return $this->actionInit(date("Y-m-d", strtotime("-7 days")), date("Y-m-d", strtotime("-7 days")));
    }

    public function actionHariIni()
    {
        return $this->actionInit(date("Y-m-d"), date("Y-m-d"));
    }

    

    /**
     * Run SomeModel::kirim_pemberitahuan for yesterday
     * @return int exit code
     */
   /* public function actionKemarin()
    {
        return $this->actionInit(date("Y-m-d", strtotime("-1 days")), date("Y-m-d", strtotime("-1 days")));
    }*/



}
