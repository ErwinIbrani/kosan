<?php

namespace app\components;

use app\models\AuthAssignment;
use Yii;
use app\models\User as UserModel;

class QueryHelper
{
    public static function getAdmin($username)
    {
        return AuthAssignment::find()
            ->select(['auth_assignment.item_name'])
            ->innerJoin('user', 'user.id = auth_assignment.user_id')
            ->where("auth_assignment.item_name='Admin'")
            ->andWhere(['user.username' => $username])
            ->andWhere(['user.status_kost' => 0])
            ->one();
    }
}