<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

use frontend\modules\doors\models\Doors;
/* @var $this yii\web\View */
/* @var $model frontend\modules\doors\models\DoorsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="poster-search">

    <?php $form = ActiveForm::begin([
        'action' => ['all'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>
    <div class="row form-group">
        <div>
            <?=$form->field($model,'address')?>
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