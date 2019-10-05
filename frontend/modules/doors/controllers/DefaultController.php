<?php

namespace frontend\modules\doors\controllers;

use frontend\modules\doors\models\DoorsSearch;
use yii\web\Controller;
use yii\data\Pagination;
use frontend\modules\doors\models\Doors;
use frontend\modules\doors\models\Clients;
use frontend\modules\doors\models\ServicePrice;

class DefaultController extends Controller {


    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        $client             = new Clients();
        $doors              = new Doors();
        $service            = ServicePrice::find()
                                          ->where(['type_service'=>ServicePrice::TYPE_SERVICE_DEMONTAG])
                                          ->orWhere(['type_service'=>ServicePrice::TYPE_SERVICE_PREPARATORY_WORK])
                                          ->all();
        $serviceOther       = ServicePrice::find()
                                          ->where(['type_service'=>ServicePrice::TYPE_SERVICE_OTHER])
                                          ->all();

        $serviceBox         = ServicePrice::find()
                                          ->where(['type_service'=>ServicePrice::TYPE_SERVICE_BOXED_PRODUCT])
                                          ->all();

        if ($client->load(\Yii::$app->request->post()) && $client->save()) {
            $doors->load(\Yii::$app->request->post());
            $doors->serviceDoors = \Yii::$app->request->post()['Doors']['serviceDoors'];

        }
        return $this->render('create', [
            'client'            => $client,
            'doors'             => $doors,
            'service'           => $service,
            'serviceBox'        => $serviceBox,
            'other'             => $serviceOther,
        ]);
    }

    public function actionOne($id) {
        $door= Doors::findOne($id);

        return $this->render('one',[
            'door'=>$door
        ]);

    }

    public function actionAll() {
        $searchModel = new DoorsSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        $pages = new Pagination([
            'totalCount' => $dataProvider
                ->query
                ->count(),
            'pageSize'=>6]);
        $doors= $dataProvider
            ->query
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy('date_create')
            ->all();
        return $this->render('all',[
            'doors'=>$doors,
            'searchModel' => $searchModel,
            'pages'=>$pages
        ]);
    }
}
