<?php

namespace console\controllers;

use frontend\modules\doors\models\Doors;
use frontend\modules\doors\models\Orders;
use yii\console\Controller;
use yii\web\User;

class DebugController extends Controller {


    public function actionIndex(){

        $this->actionCreateOrders();
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
            $order->date_create = $door->date_create;
            $order->save();
        }
    }

    public function actionCheckComplete(){

    }
}