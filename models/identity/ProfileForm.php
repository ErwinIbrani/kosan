<?php
namespace app\models\identity;

use yii\base\Model;

use app\models\identity\User;

/**
 * Signup form
 */
class ProfileForm extends Model
{
    public $avatar;
    public $nik;
    public $phone;
    public $address;
    public $name;
    public $username;
    public $email;
    public $password;
    public $bank_name;
    public $acc_name;
    public $acc_number;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

          /*  ['bank_name', 'trim'],
            ['bank_name', 'required'],
            ['bank_name', 'string', 'max' => 255],
            
            ['acc_name', 'trim'],
            ['acc_name', 'required'],
            ['acc_name', 'string', 'max' => 255],

            ['acc_number', 'trim'],
            ['acc_number', 'required'],
            ['acc_number', 'string', 'max' => 255],
*/

            ['bank_name', 'trim'],
            ['bank_name', 'required'],
            ['bank_name', 'string', 'max' => 30],
            
            ['acc_name', 'trim'],
            ['acc_name', 'required'],
            ['acc_name', 'string', 'max' => 50],

            ['acc_number', 'trim'],
            ['acc_number', 'required'],
            ['acc_number', 'string', 'max' => 25],


            
          
          /*[
            ['acc_number'],
            'unique',
            'targetClass'    => '\app\models\identity\User',
            'targetAttribute'=> ['acc_number'],
            'message' => 'This bank account has already been taken.','when'=>function($model){
                return (empty($model->acc_number));
            }
          ],
*/


          ['name','trim'],
          ['name','required'],
          ['name', 'string', 'max' => 255],
          ['name', 'unique', 'targetClass' => '\app\models\identity\User', 'message' => 'This name has already been taken.','when'=>function($model) {
                return (empty($model->name));
          }],



          ['nik','trim'],
          ['nik','required'],
          ['nik', 'integer'],
          [
            'nik',
            'unique',
            'targetClass' => '\app\models\identity\User',
            'message' => 'This nik has already been taken.',
            'when'=>function($model){
                return (empty($model->nik));
            }
          ],

          ['phone','trim'],
          ['phone','required'],
          ['phone', 'integer'],
          [
            'phone',
            'unique',
            'targetClass' => '\app\models\identity\User',
            'message' => 'This phone has already been taken.',
            'when'=>function($model){
                return (empty($model->phone));
            }
          ],


            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\identity\User', 'message' => 'This username has already been taken.','when'=>function($model) {
                return (empty($model->username));
            }],
            ['username', 'string', 'min' => 5, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\identity\User', 'message' => 'This email address has already been taken.','when'=>function($model) {
                return (empty($model->username));
            }],

            ['password', 'string', 'min' => 6,'when'=>function($model){
                return $model->password !== '';
            }],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function update($id)
    {
        if (!$this->validate()) {
            return null;
        }

          $user             = User::findOne(['id'=>$id]);
          $user->name       = $this->name;
          $user->username   = $this->username;
          $user->email      = $this->email;
          $user->bank_name  = $this->bank_name;
          $user->acc_name   = $this->acc_name;
          $user->acc_number = $this->acc_number;
          $user->nik        = $this->nik;
          $user->phone      = $this->phone;

          if ($this->avatar) {
          $user->avatar     = $this->avatar;
        }
        if ($this->password) {
          $user->setPassword($this->password);
        }

        return $user->save() ? $user : null;
    }


    public function updateuser($id)
    {
        if (!$this->validate()) {
            return null;
        }

        $user = User::findOne(['id'=>$id]);
        $user->name = $this->name;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->bank_name = $this->bank_name;
        $user->acc_name = $this->acc_name;
        $user->acc_number = $this->acc_number;
        if ($this->avatar) {
          $user->avatar = $this->avatar;
        }
        if ($this->password) {
          $user->setPassword($this->password);
        }

        return $user->save() ? $user : null;
    }

}
