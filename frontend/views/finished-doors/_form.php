<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\file\FileInput;
use \frontend\modules\doors\models\Size;
use frontend\modules\doors\models\FinishedDoors;

/* @var $this yii\web\View */
/* @var $model frontend\modules\doors\models\FinishedDoors */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="finished-doors-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_doors')->dropDownList([
        FinishedDoors::TYPE_DOORS_IRON =>'Металическая',
        FinishedDoors::TYPE_DOORS_INTERIOR =>'Межкомнатная'
    ]) ?>

    <?= $form->field($model,'sizeDoors[]')->widget(Select2::classname(),[
            'data' => \yii\helpers\ArrayHelper::map(Size::find()->all(),'id','size'),
            'language' =>'ru',
            'options'   => ['placeholder' =>'Выбрать размер','multiple' =>true],
            'pluginOptions' => [
                'tags' => true,
                'maximumInputLength' => 10
            ],
        ])?>

    <?= $form->field($model,'imagesFinishedDoors')->widget(FileInput::className(),[
            'options' =>['multiple'=>true]
    ])?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
