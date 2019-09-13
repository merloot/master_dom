<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

class TestController extends Controller {

    public function actionIndex(){
        var_dump(1);
//        $test = Yii::$app->db->getDriverName();
//        var_dump($test);
    }
}