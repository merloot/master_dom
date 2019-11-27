<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\doors\models\FinishedDoors */

$this->title = 'Update Finished Doors: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Finished Doors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="finished-doors-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
