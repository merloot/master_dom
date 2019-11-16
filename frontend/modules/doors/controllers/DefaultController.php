<?php

namespace frontend\modules\doors\controllers;

use yii\base\Model;
use yii\web\Controller;
use common\models\User;
use yii\data\Pagination;
use frontend\modules\doors\models\Doors;
use frontend\modules\doors\models\Orders;
use frontend\modules\doors\models\Clients;
use frontend\modules\doors\models\OldDoors;
use frontend\modules\doors\models\OrdersSearch;
use frontend\modules\doors\models\ServicePrice;
use frontend\modules\doors\models\OldDoorsSearch;

class DefaultController extends Controller
{

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

            $client             = new Clients();

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
            $data = \Yii::$app->request->post('Doors',[]);
            if ($count) {
                for ($i=0; $i < $count; $i++){
                    $allDoors[] = new Doors();
                }
            }else{
                $allDoors = [new Doors()];
            }
            if ($client->load(\Yii::$app->request->post())&& $client->validate()){
                $client->save();
                foreach (array_keys($data) as $value){
                    $allDoors[$value] = new Doors();
                }
                if (Model::loadMultiple($allDoors,\Yii::$app->request->post())
                    && Model::validateMultiple($allDoors)
                    ){
                    foreach ($allDoors as $door){
                        $door->id_order     =   $client->id;
                        $door->save();
                        $order              =   new Orders();
                        $order->id_doors    =   $door->id;
                        $order->id_order    =   $client->id;
                        $order->id_client   =   $client->id;
                        $order->save();
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

    public function actionOrder($id) {
        if (!\Yii::$app->user->isGuest){

            $order= Orders::find()->where(['id_order'=>$id])->all();

            return $this->render('one-order',[
                'order'=>$order
            ]);
        }
        return $this->goHome();
    }

    public function actionAll() {
        if (!\Yii::$app->user->isGuest){
            $searchOrder = new OrdersSearch();
            $dataProvider = $searchOrder->search(\Yii::$app->request->queryParams);
            $pages = new Pagination([
                'totalCount' => $dataProvider
                    ->query
                    ->count(),
                'pageSize'=>6]);

            $orders= $dataProvider
                ->query
                ->offset($pages->offset)
                ->limit($pages->limit)
                ->orderBy(['id_order'=>SORT_DESC])
                ->all();

            return $this->render('all',[
                'orders'      => $orders,
                'searchOrder' => $searchOrder,
                'pages'       => $pages
            ]);
        }
        return $this->goHome();
    }

    public function actionCountDoors() {
        return $this->render('count-doors');
    }

    public function actionOrderUpdate($id) {
        if (\Yii::$app->user->identity->status !== User::STATUS_MANAGER){
            $order = Orders::findOne($id);
            $client = Clients::findOne($order->id_client);
            $doors = Doors::find()->where(['id_order'=>$order->id_order])->all();


            if (Model::loadMultiple($doors,\Yii::$app->request->post()) && $client->load(\Yii::$app->request->post())) {
                $isValid = $client->validate() && Model::validateMultiple($doors);
                if ($isValid) {
                    foreach ($doors as $door){
                        $door->save(false);
                    }
                    $client->save(false);
                    return $this->redirect(['one-order', 'id' => $id]);
                }
            }
            return $this->render('update-order',[
                'allDoors'   => $doors,
                'doors'      => $order,
                'client'     => $client
            ]);
        }
        return $this->goHome();
    }

    public function actionUpdate($id) {
        if (\Yii::$app->user->identity->status !== User::STATUS_MANAGER){
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
        return $this->goHome();
    }

    public function actionAllOld(){
        if (!\Yii::$app->user->isGuest){
            $searchModel = new OldDoorsSearch();
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
                ->orderBy(['date'=>SORT_DESC,'id'=>SORT_DESC])
                ->all();

            return $this->render('all-old',[
                'doors'=>$doors,
                'searchModel' => $searchModel,
                'pages'=>$pages
            ]);
        }
        return $this->goHome();
    }

    public function actionOneOld($id){
        if (!\Yii::$app->user->isGuest){

            $door= OldDoors::findOne($id);

            return $this->render('one-old',[
                'door'=>$door
            ]);
        }
        return $this->goHome();
    }
}
