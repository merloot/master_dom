<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\doors\models\FinishedDoors */

$this->title = 'Create Finished Doors';
$this->params['breadcrumbs'][] = ['label' => 'Finished Doors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="finished-doors-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
