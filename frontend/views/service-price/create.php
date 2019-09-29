<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\doors\models\ServicePrice */

$this->title = 'Создание новой услуги';
$this->params['breadcrumbs'][] = ['label' => 'Service Prices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-price-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
