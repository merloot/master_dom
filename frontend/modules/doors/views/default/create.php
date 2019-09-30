<?php

use yii\helpers\Html;
use frontend\modules\doors\models\Doors;
use frontend\modules\doors\models\ServicePrice;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $client frontend\modules\doors\models\Clients*/
/* @var $doors frontend\modules\doors\models\Doors */
/* @var $service frontend\modules\doors\models\ServicePrice*/
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Установка дверей';
?>

<div class="service-price-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <div class="row">
            <!--Клиенты-->
            <div class="col-xs-12 col-sm-12 co12-md-12 col-lg-12">
                <h3>Общая информация о заказчике: </h3>
                <?= $form->field($client, 'street')->textInput() ?>
            </div>
            <div class="col-xs-12 col-sm-12 co12-md-6 col-lg-6">
                <?= $form->field($client, 'FIO')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 co12-md-6 col-lg-6">
                <?= $form->field($client, 'telephone')->textInput(['maxlength'=>11]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 co12-md-12 col-lg-12">
                <?= $form->field($client, 'comment')->textarea() ?>
            </div>
        </div>
    </div>


    <!--Двери-->
    <div>
        <h3>Размеры дверей: </h3>
        <?= $form->field($doors, 'type_doors')->radioList([
            Doors::TYPE_DOORS_IRON =>'Металическая',
            Doors::TYPE_DOORS_INTERIOR =>'Межкомнатная'
        ]) ?>

        <div>
            <label>Вид проема в плане:</label>
            <?=$form->field($doors, 'type_opening')->radioList([
                Doors::TYPE_OPENING_MID   => Html::img('/image/mid_doors.svg', ['width' => 250, 'height' => 150]) ,
                Doors::TYPE_OPENING_LEFT  => Html::img('/image/left_doors_1.svg',['width' => 250, 'height' => 150]) ,
                Doors::TYPE_OPENING_RIGHT => Html::img('/image/right_doors.svg' ,['width' => 250, 'height' => 150])
            ], ['encode' => false])->label(false)
            ?>
        </div>

        <br>
        <div>
            <label>Сторонность:</label>
            <?=$form->field($doors, 'adherence')->radioList([
                Doors::ADHERENCE_RIGHT  => Html::img('/image/right_doors_1.svg', ['width' => 250, 'height' => 150]),
                Doors::ADHERENCE_LEFT   => Html::img('/image/left_doors.svg',['width' => 250, 'height' => 150]),
            ], ['encode' => false])->label(false)
            ?>
        </div>

        <?= $form->field($doors, 'comment')->textInput() ?>

        <?= $form->field($doors, 'wall_material')->radioList([
            'Сибит'     =>   'Сибит',
            'Кирпич'    =>   'Кирпич',
            'Ж/Бетон'   =>   'Ж/Бетон',
            'Дерево'    =>   'Дерево',
            'Другое'    =>   Html::textInput('wall_material'),
        ], ['encode' => false])->label(false)
        ?>

    </div>

    <!--Сервисы-->

    <?php
    foreach ($service as $one){
        echo Html::label($one['name']);
        echo PHP_EOL;
        echo Html::label($one['price'].'руб');
        echo PHP_EOL;
    }
    ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-master']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
