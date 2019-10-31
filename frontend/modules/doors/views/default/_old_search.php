<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\modules\doors\models\DoorsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="poster-search">

    <?php $form = ActiveForm::begin([
        'action' => ['all-old'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>
    <div class="row form-group">
        <div>
            <?= $form->field($model, 'date_to')->widget(DatePicker::class, [
                'language' => 'ru',
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]) ?>
            <?= $form->field($model, 'date_from')->widget(DatePicker::class, [
                'language' => 'ru',
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]) ?>
            <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>

<style>
    .row div{
        margin-bottom: 0;
        display: flex;
        justify-content: center;
    }
    .row div div{
        display: flex;
        align-items: center;
    }
    .row div div label{
        margin-left: 10px;
        margin-right: 10px;
    }
    .btn-primary{
        margin-left: 10px;
        height: 35px;
    }
</style>