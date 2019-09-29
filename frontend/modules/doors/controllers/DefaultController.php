<?php

namespace frontend\modules\doors\controllers;

use frontend\modules\doors\models\Clients;
use frontend\modules\doors\models\Doors;
use frontend\modules\doors\models\ServicePrice;
use yii\web\Controller;

class DefaultController extends Controller {


    public function actionIndex() {

    }

    public function actionCreate() {
        $client = new Clients();
        $doors = new Doors();
        $service = ServicePrice::find()->all();

        if ($client->load(\Yii::$app->request->post()) && $client->save()) {
            if ($doors->load(\Yii::$app->request->post()) && $doors->save()){
            }
            return true;
        }
        return $this->render('create', [
            'client'    => $client,
            'doors'     => $doors,
            'service'   => $service
        ]);
    }
}
