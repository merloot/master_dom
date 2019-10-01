<?php

namespace frontend\modules\doors\controllers;

use frontend\modules\doors\models\Clients;
use frontend\modules\doors\models\Doors;
use frontend\modules\doors\models\ServiceDoors;
use frontend\modules\doors\models\ServicePrice;
use yii\web\Controller;

class DefaultController extends Controller {


    public function actionIndex() {

    }

    public function actionCreate() {
        $client = new Clients();
        $doors = new Doors();
        $doorsService = new ServiceDoors();
        $service = ServicePrice::find()->all();
        $serviceDemontag = ServiceDoors::find()->where(['type_service'=>ServicePrice::TYPE_SERVICE_DEMONTAG])->all();
        $serviceBox = ServicePrice::find()->where(['type_service'=>ServicePrice::TYPE_SERVICE_BOXED_PRODUCT])->all();
        $serviceOther = ServicePrice::find()->where(['type_service'=>ServicePrice::TYPE_SERVICE_OTHER])->all();

        if ($client->load(\Yii::$app->request->post()) && $client->save()) {
            if ($doors->load(\Yii::$app->request->post()) && $doors->save()){
            }
            return true;
        }
        return $this->render('create', [
            'client'            => $client,
            'doors'             => $doors,
            'service'           => $service,
            'box_product'       => $serviceBox,
            'other'             => $serviceOther,
            '$serviceDemontag'  => $serviceDemontag
        ]);
    }
}
