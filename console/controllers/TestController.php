<?php

namespace console\controllers;

use frontend\modules\doors\models\Clients;
use frontend\modules\doors\models\Doors;
use frontend\modules\doors\models\ServiceDoors;
use frontend\modules\doors\models\ServicePrice;
use Yii;
use yii\console\Controller;
use yii\helpers\Html;
use yii\helpers\Json;

class TestController extends Controller {

    public function actionIndex($clientName='asdasdasdsadasdsa'){
        $client = Clients::find()->where(['FIO'=>$clientName])->asArray()->one();
        var_dump($clientName);
        var_dump($client['id']);
        die();
    }
}