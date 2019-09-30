<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use common\models\User;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Новый пользователь';
?>

<div class="site-login container">
    <div class="row">
        <div class="col-12">
            <div class="auth-block">
                <h4>Создание нового пользователя</h4>
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?=$form->field($model,'status')->dropDownList([
                    User::STATUS_ADMIN      => 'Администратор',
                    User::STATUS_MANAGER    => 'Менеджер',
                    User::STATUS_WORKER     => 'Монтажник'
                ])?>

                <div class="form-group auth-block__button">
                    <?= Html::submitButton('Создать', ['class' => 'btn btn-master w-100', 'name' => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>