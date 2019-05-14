<?php
namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use fedemotta\cronjob\models\CronJob;
use app\models\UserKosan;
use app\models\User;
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
               self::kirim_pemberitahuan((string) $date);
            }
            $command->finish();
            return Controller::EXIT_CODE_NORMAL;
        }
    }

     /**
     * Run SomeModel::jalankan_pemberitahuan for today only as the default action
     * @return int exit code
     */
    public function actionIndex(){
        return $this->actionInit(date("Y-m-d"), date("Y-m-d"));
    }
    /**
     * Run SomeModel::jalankan_pemberitahuan for yesterday
     * @return int exit code
     */
    public function actionYesterday()
    {
        return $this->actionInit(date("Y-m-d", strtotime("-1 days")), date("Y-m-d", strtotime("-1 days")));
    }


    public static function kirim_pemberitahuan($date)
    {
        $target   = UserKosan::find()
                  ->where(['tgl_berakhir_kos' => $date])
                  ->all();
       
        if(!empty($target)) {
           foreach ($target as $model) {
             $model->status_cron_job = 'Dieksekusi';
             self::kirim_email($model->user_id);
             return $model->save(false);
           }
        }
        else{
            return $target;
        }   
    }


     public static function kirim_email($user_id)
    {
        $users = User::find()
                ->where(['id' => $user_id])
                ->all();
        foreach ($users as $user) {
         echo "Sedang Mengirim Email.....";
         Yii::$app->mailer->compose()
                 ->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->name.'robot'])
                 ->setTo($user->email)
                 ->setSubject('Kosan Anda Akan Segera Berakhir, Mohon Untuk Segera Membayar/Memperpanjang Kosan')
                 ->send();
        }
    }


}
