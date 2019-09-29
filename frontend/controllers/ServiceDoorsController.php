<?php

namespace frontend\controllers;

use Yii;
use frontend\modules\doors\models\ServiceDoors;
use common\models\ServiceDoorsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ServiceDoorsController implements the CRUD actions for ServiceDoors model.
 */
class ServiceDoorsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ServiceDoors models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServiceDoorsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ServiceDoors model.
     * @param integer $id_service
     * @param integer $id_doors
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_service, $id_doors)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_service, $id_doors),
        ]);
    }

    /**
     * Creates a new ServiceDoors model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ServiceDoors();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_service' => $model->id_service, 'id_doors' => $model->id_doors]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ServiceDoors model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_service
     * @param integer $id_doors
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_service, $id_doors)
    {
        $model = $this->findModel($id_service, $id_doors);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_service' => $model->id_service, 'id_doors' => $model->id_doors]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ServiceDoors model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_service
     * @param integer $id_doors
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_service, $id_doors)
    {
        $this->findModel($id_service, $id_doors)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ServiceDoors model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_service
     * @param integer $id_doors
     * @return ServiceDoors the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_service, $id_doors)
    {
        if (($model = ServiceDoors::findOne(['id_service' => $id_service, 'id_doors' => $id_doors])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
