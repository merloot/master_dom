<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\doors\models\ServicePriceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Прайс услуг';
?>
<div class="service-price-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Добавить услугу', ['create'], ['class' => 'btn btn-master']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'type_service',
            'price',
            'percent_accruals',
            //'unit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
