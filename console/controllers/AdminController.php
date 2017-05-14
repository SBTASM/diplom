<?php

namespace console\controllers;

use common\models\User;
use yii\console\Controller;

class AdminController extends Controller{

    public function actionCreate($name, $email, $password){
        $user = new User();

        $user->email = $email;
        $user->username = $name;
        $user->setPassword($password);

        return $user->save();
    }
}