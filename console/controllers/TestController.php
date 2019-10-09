<?php

namespace console\controllers;

use frontend\modules\doors\models\Doors;
use frontend\modules\doors\models\ServiceDoors;
use frontend\modules\doors\models\ServicePrice;
use Yii;
use yii\console\Controller;
use yii\helpers\Html;
use yii\helpers\Json;

class TestController extends Controller {

    public function actionIndex(){
        $array = '{"id":"44","value":"1"}';
        $array = Json::decode($array);
        $door = Doors::findOne(164);
        $service = ServicePrice::findOne($array['id']);
        $serviceDoors = new ServiceDoors();
        $serviceDoors->id_doors = $door->id;
        $serviceDoors->id_service = $array['id'];
        $serviceDoors->count_service = $array['value'];
        if ($serviceDoors->save()){
            $door->sum += (float)$service->price * (int)$array['value'];
            $door->save();
            return true;
        }
        return false;
    }
}