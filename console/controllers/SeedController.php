<?php

namespace console\controllers;
use yii\console\Controller;
use common\models\User;
use common\models\Type;

class SeedController extends Controller
{
    public function actionIndex()
    {

        $admin = new User();
        $admin->email = "ado@ado.com";
        $admin->username = "Admin";
        $admin->status = 10;
        $admin->setPassword("123123123");
        $admin->generateAuthKey();
        $admin->save();
    }
}