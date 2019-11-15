<?php

namespace console\controllers;

use frontend\modules\doors\models\Clients;
use frontend\modules\doors\models\Doors;
use frontend\modules\doors\models\Orders;
use frontend\modules\doors\models\Parser;
use frontend\modules\doors\models\ServiceDoors;
use frontend\modules\doors\models\ServicePrice;
use Yii;
use yii\console\Controller;
use yii\helpers\Html;
use yii\helpers\Json;

class DebugController extends Controller {

    public function actionIndex(){

    }

    public function actionUpdateDoors(){
        $doors = Doors::find()->where(['id_order'=>null])->all();

        foreach ($doors as $door){
            $door->id_order = $door->client_id;
            $door->save();
        }
    }

    public function actionCreateOrders(){
        $doors = Doors::find()->all();

        foreach ($doors as $door){
            $order = new Orders();
            $order->id_order = $door->client_id;
            $order->id_doors = $door->id;
            $order->id_client = $door->client_id;
            $order->save();
        }
    }

    public function actionCheckComplete(){

    }
}