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
?>

<div class="service-price-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--Клиенты-->
    <div>
        <h3>Общая информация о заказчике: </h3>
        <?= $form->field($client, 'FIO')->textInput(['maxlength' => true]) ?>

        <?= $form->field($client, 'telephone')->textInput(['maxlength'=>11]) ?>

        <?= $form->field($client, 'comment')->textInput() ?>

        <?= $form->field($client, 'street')->textInput() ?>

        <?= $form->field($client, 'house')->textInput() ?>

        <?= $form->field($client, 'porch')->textInput() ?>

        <?= $form->field($client, 'apartment')->textInput() ?>
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
    <?php
    foreach ($service as $one){
        echo $one['name'];

    }
    ?>

    <!--Сервисы-->



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
