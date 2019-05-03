<?php
namespace app\models\identity;

use yii\base\Model;

use app\models\identity\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $id;
    public $name;
    public $username;
    public $nik;
    public $phone;
    public $address;
    public $email;
    public $password;
    public $term;
    public $bank_name;
    public $acc_name;
    public $acc_number;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            /*[
              ['acc_number'],
              'unique',
              'targetClass' => '\app\models\identity\User',
              'targetAttribute'=> ['acc_number'],
              'message' => 'This bank account has already been taken.'
            ],*/

            ['bank_name', 'trim'],
            //['bank_name', 'required'],
            ['bank_name', 'string', 'max' => 30],
            
            ['acc_name', 'trim'],
            //['acc_name', 'required'],
            ['acc_name', 'string', 'max' => 50],

            ['acc_number', 'trim'],
            //['acc_number', 'required'],
            ['acc_number', 'string', 'max' => 25],


            ['name','trim'],
            ['name','required'],
            ['name', 'string', 'max' => 255],
            ['name','unique', 'targetClass' => '\app\models\identity\User', 'message' => 'This nik has already been taken.'],

            ['nik','trim'],
            //['nik','required'],
            ['nik', 'integer'],
            //['nik','unique', 'targetClass' => '\app\models\identity\User', 'message' => 'This nik has already been taken.'],

            ['phone','trim'],
            //['phone','required'],
            ['phone', 'integer'],
            //['phone','unique', 'targetClass' => '\app\models\identity\User', 'message' => 'This phone has already been taken.'],

            ['address','trim'],
            //['address','required'],
            ['address', 'string'],

            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\identity\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 5, 'max' => 255],

            ['email', 'trim'],
           //['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\identity\User', 'message' => 'This email address has already been taken.'],

            //['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->name = $this->name;
        $user->nik = $this->nik;
        $user->phone = $this->phone;
        $user->address = $this->address;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }


     public function signupAdmin()
    {
        
        if (!$this->validate()) {
            return null;
        }  
     /*   $last = User::find()->max('id');
         if (!empty($last)) {
             $num = $last + 1;
          }else{
            $num = 1;
        }*/
        $user             = new User();
        $user->username   = $this->username;
        $user->name       = $this->name;
        $user->nik        = $this->nik;
        $user->phone      = $this->phone;
        $user->address    = $this->address;
        $user->email      = $this->username.'@mandalasari.co.id';
        $user->bank_name  = $this->bank_name;
        $user->acc_name   = $this->acc_name;
        $user->acc_number = $this->acc_number;
        $user->setPassword('mandalasari1234567');
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }


     public function signupAdminUser()
    {
        if (!$this->validate()) {
            return null;
        }

        if(!empty($this->email)){

        $user            = new User();
        $user->name      = $this->name;
        $user->nik       = $this->nik;
        $user->phone     = $this->phone;
        $user->address   = $this->address;
        $user->username  = $this->username;
        $user->email     = $this->email;
        $user->bank_name = $this->bank_name;
        $user->acc_name  = $this->acc_name;
        $user->acc_name  = $this->acc_name;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null; 
           
        }else if(empty($this->email)){
        $user            = new User();
        $user->name      = $this->name;
        $user->nik       = $this->nik;
        $user->phone     = $this->phone;
        $user->address   = $this->address;
        $user->username  = $this->username;
        $user->email     = $this->username.'@email.com';
        $user->bank_name = $this->bank_name;
        $user->acc_name  = $this->acc_name;
        $user->acc_name  = $this->acc_name;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;

        }

       
    }




}
