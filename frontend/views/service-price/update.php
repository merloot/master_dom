<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\doors\models\ServicePrice */

$this->title = 'Update Service Price: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Service Prices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="service-price-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
