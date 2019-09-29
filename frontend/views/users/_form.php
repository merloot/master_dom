<?php

use yii\helpers\Html;
use \common\models\User;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->dropDownList([
            User::STATUS_ADMIN =>'Админ',
            User::STATUS_MANAGER=>'Менеджер',
            User::STATUS_WORKER =>'Монтажник',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
