<?php

use yii\helpers\Html;
use frontend\modules\doors\models\ServicePrice;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model frontend\modules\doors\models\ServicePrice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-price-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_service')->dropDownList([
            ServicePrice::TYPE_SERVICE_DEMONTAG => 'Демонтажные работы',
            ServicePrice::TYPE_SERVICE_PREPARATORY_WORK =>'Подготовительные работы и финишные работы',
            ServicePrice::TYPE_SERVICE_BOXED_PRODUCT =>'коробочный продукт',
            ServicePrice::TYPE_SERVICE_OTHER =>'другое'

    ]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'percent_accruals')->textInput() ?>

    <?= $form->field($model, 'unit')->dropDownList([
            ServicePrice::TYPE_UNIT_PIECE =>'шт',
            ServicePrice::TYPE_UNIT_SET   =>'комплект'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
