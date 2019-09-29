<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\helpers\Html;

class TestController extends Controller {

    public function actionIndex(){
        $test =Html::img('@images'.'/left_doors.svg');
        var_dump($test);
    }
}