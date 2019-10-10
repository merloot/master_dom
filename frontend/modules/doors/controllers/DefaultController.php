<?php

namespace frontend\modules\doors\controllers;

use frontend\modules\doors\Module;
use yii\base\Model;
use yii\helpers\Url;
use yii\web\Controller;
use yii\data\Pagination;
use frontend\modules\doors\models\Doors;
use frontend\modules\doors\models\Clients;
use frontend\modules\doors\models\DoorsSearch;
use frontend\modules\doors\models\ServicePrice;

class DefaultController extends Controller
{

    public function beforeAction($action) {
        return true;
        return parent::beforeAction($action);
    }

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionCreate()
    {
//                if (\Yii::$app->request->isPost) {
//            \Yii::$app->response->format = 'json';
//            echo(json_encode($_POST));die();
//        }
        $client   = new Clients();

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

        $allDoors =[];

        $count = \Yii::$app->request->post('count');
        if (!isset($count)) {
            for ($i=0; $i < 2; $i++){
                $allDoors[] = new Doors();
            }
        }
        for ($i=0; $i < \Yii::$app->request->post('count'); $i++){
            $allDoors[] = new Doors();
        }

        if ($client->load(\Yii::$app->request->post())&& $client->validate()) {
            if ($client->save()){
                if (Model::loadMultiple($allDoors,\Yii::$app->request->post()) && Model::validateMultiple($allDoors)){
                    foreach ($allDoors as  $door){
                        $door->save();
                    }
                    return $this->redirect('all');
                }
            }
        }


        return $this->render('create', [
            'allDoors'          => $allDoors,
            'client'            => $client,
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

    public function actionCountDoors(){
        return $this->render('count-doors');
    }

    public function actionUpdate($id){
        $door = Doors::findOne($id);

        if ($door->load(\Yii::$app->request->post()) && $door->save()) {
            return $this->redirect(['view', 'id' => $door->id]);
        }
        return $this->render('update',[
            'door' => $door
        ]);
    }
}
