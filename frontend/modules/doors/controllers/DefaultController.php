<?php

namespace frontend\modules\doors\controllers;

use common\models\User;
use frontend\modules\doors\Module;
use yii\base\Model;
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

//        if (\Yii::$app->request->isPost) {
//            \Yii::$app->response->format = 'json';
//            echo(json_encode($_POST));
//            die();
//        }
        if (\Yii::$app->user->isGuest || \Yii::$app->user->identity->status === User::STATUS_MANAGER){
            return $this->goHome();
        }elseif (\Yii::$app->user->identity->status === User::STATUS_ADMIN || \Yii::$app->user->identity->status === User::STATUS_WORKER){

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
                for ($i=0; $i < 1; $i++){
                    $allDoors[] = new Doors();
                }
            }
            for ($i=0; $i < $count; $i++){
                $allDoors[] = new Doors();
            }

            if ($client->load(\Yii::$app->request->post())&& $client->validate()){
                $client->save();
                if (Model::loadMultiple($allDoors,\Yii::$app->request->post()) && Model::validateMultiple($allDoors)){
                    foreach ($allDoors as $door){
                        $door->client_id = $client->id;
                        $door->save();
                    }
                    return $this->redirect('all');
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
        return $this->goHome();
    }

    public function actionOne($id) {
        if (!\Yii::$app->user->isGuest){

            $door= Doors::findOne($id);

            return $this->render('one',[
                'door'=>$door
            ]);
        }
        return $this->goHome();
    }

    public function actionAll() {
        if (!\Yii::$app->user->isGuest){
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
                ->orderBy(['date_create'=>SORT_DESC,'id'=>SORT_DESC])
                ->all();

            return $this->render('all',[
                'doors'=>$doors,
                'searchModel' => $searchModel,
                'pages'=>$pages
            ]);
        }
        return $this->goHome();
    }

    public function actionCountDoors() {
        return $this->render('count-doors');
    }

    public function actionUpdate($id) {
        $door = Doors::findOne($id);
        $client = Clients::findOne($door->client_id);

        if ($door->load(\Yii::$app->request->post()) && $client->load(\Yii::$app->request->post())) {
            $isValid = $door->validate();
            $isValid = $client->validate() && $isValid;
            if ($isValid) {
                $door->save(false);
                $client->save(false);
                return $this->redirect(['one', 'id' => $id]);
            }
        }
        return $this->render('update',[
            'doors'      => $door,
            'client'    => $client
        ]);
    }
}
