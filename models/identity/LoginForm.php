<?php
namespace app\models\identity;

use Yii;
use yii\base\Model;
use app\models\User as UserModel;
use app\models\identity\User;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // email and password are both required
            [['username', 'password'], 'required'],
            [['username'], 'string'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect email or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided email and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }

        return false;
    }

    /**
     * Finds user by [[email]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

    public function isAdmin($username)
    {

        $data =  UserModel::find()
                  ->innerJoinWith('assignments', true)
                  ->where("auth_assignment.item_name='Admin'")
                  ->andWhere(['user.username' => $username])
                  ->andWhere(['user.status_kost' => 0])
                  ->one();

        return $data;
    }

    public function isPemilik($username)
    {

        $data =  UserModel::find()
            ->innerJoinWith('assignments', true)
            ->where("auth_assignment.item_name='Pemilik Kosan Haji Ajat'")
            ->andWhere(['user.username' => $username])
            ->andWhere(['user.status_kost' => 0])
            ->one();

        return $data;
    }

    public function isPengelola($username)
    {

        $data =  UserModel::find()
            ->innerJoinWith('assignments', true)
            ->where("auth_assignment.item_name='Bagian Pemeliharaan'")
            ->andWhere(['user.username' => $username])
            ->andWhere(['user.status_kost' => 0])
            ->one();

        return $data;
    }

    public function isTeknisi($username)
    {

        $data =  UserModel::find()
            ->innerJoinWith('assignments', true)
            ->where("auth_assignment.item_name='Teknisi'")
            ->andWhere(['user.username' => $username])
            ->andWhere(['user.status_kost' => 0])
            ->one();

        return $data;
    }



    public function isKost($username)
    {
        return
        UserModel::find()
            ->innerJoinWith('assignments', true)
            ->where("auth_assignment.item_name='User'")
            ->andWhere(['user.username' => $username])
            ->andWhere(['user.status_kost' => 1])
            ->one();
    }

    public function notKost($username)
    {
        return UserModel::find()
            ->innerJoinWith('assignments', true)
            ->where("auth_assignment.item_name='User'")
            ->andWhere(['user.username' => $username])
            ->andWhere(['user.status_kost' => 0])
            ->one();
    }

}
