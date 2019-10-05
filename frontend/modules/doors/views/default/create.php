<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\modules\doors\models\Doors;
use frontend\modules\doors\models\Clients;

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
            <div class="col-xs-12 col-sm-12 co1-md-12 col-lg-12">
                <h3>Общая информация о заказчике: </h3>
                <?= $form->field($client, 'address')->textInput() ?>
            </div>
            <div class="col-xs-12 col-sm-12 co1-md-6 col-lg-6">
                <?= $form->field($client, 'FIO')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 co1-md-6 col-lg-6">
                <?= $form->field($client, 'telephone')->textInput(['maxlength'=>11]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 co1-md-12 col-lg-12">
                <?=$form->field($client,'type_elevator')->dropDownList([
                          Clients::TYPE_ELEVATOR_PASSENGER    =>  'Пассажирский',
                          Clients::TYPE_ELEVATOR_GOODS        =>  'Грузовой',
                          Clients::TYPE_ELEVATOR_FALSE        =>  'Лифт отсутствует',
                ])?>
            </div>
            <div class="col-xs-12 col-sm-12 co1-md-12 col-lg-12">
                <?= $form->field($client, 'comment')->textarea() ?>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="door-header">
                    <h1>Двери:</h1>
                    <button class="btn btn-master">Добавить дверь</button>
                </div>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    Дверь 1
                                </a>
                                <a>X</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 co1-md-6 col-lg-6">
                                        <?= $form->field($doors, 'type_doors')->dropDownList([
                                            Doors::TYPE_DOORS_IRON =>'Металическая',
                                            Doors::TYPE_DOORS_INTERIOR =>'Межкомнатная'
                                        ]) ?>

                                        <?= $form->field($doors, 'comment')->textarea() ?>

                                        <hr>

                                <div>
                                    <label>Материал стен:</label>
                                    <?= $form->field($doors, 'wall_material')->radioList([
                                        'Сибит'     =>   'Сибит',
                                        'Кирпич'    =>   'Кирпич',
                                        'Ж/Бетон'   =>   'Ж/Бетон',
                                        'Дерево'    =>   'Дерево',
                                        'Другое'    =>   Html::textInput( 'wall_material',
                                            Yii::$app->request->post('wall_material'),
                                            [
                                                'class' => 'form-control', 'placeholder' => 'Свой вариант'
                                            ]),
                                    ], [
                                            'encode' => false
                                    ])->label(false)
                                    ?>
                                </div>

                                        <hr>

                                        <div>
                                            <label>Вид проема в плане:</label>
                                            <?=$form->field($doors, 'type_opening')->radioList([
                                                Doors::TYPE_OPENING_MID   => Html::img('/image/mid_doors.svg', ['width' => '100%', 'height' => 150]) ,
                                                Doors::TYPE_OPENING_LEFT  => Html::img('/image/left_doors_1.svg',['width' => '100%', 'height' => 150]) ,
                                                Doors::TYPE_OPENING_RIGHT => Html::img('/image/right_doors.svg' ,['width' => '100%', 'height' => 150])
                                            ], ['encode' => false])->label(false)
                                            ?>
                                        </div>

                                        <hr>

                                        <div>
                                            <label>Сторонность:</label>
                                            <?=$form->field($doors, 'adherence')->radioList([
                                                Doors::ADHERENCE_INTERIOR_LEFT      => Html::img('/image/left_doors.svg', ['width' => '100%', 'height' => 150]),
                                                Doors::ADHERENCE_INTERIOR_RIGHT     => Html::img('/image/left_doors.svg',['width' => '100%', 'height' => 150]),
                                                Doors::ADHERENCE_OUTDOOR_LEFT       => Html::img('/image/left_doors.svg', ['width' => '100%', 'height' => 150]),
                                                Doors::ADHERENCE_OUTDOOR_RIGHT      => Html::img('/image/left_doors.svg',['width' => '100%', 'height' => 150]),
                                            ], ['encode' => false])->label(false)
                                            ?>
                                        </div>

                                        <hr>

                                        <label class="gabarits">
                                            Габариты проёма, коробки, полотна
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">

                                                </div>
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">
                                                    Высота
                                                </div>
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">
                                                    Ширина
                                                </div>
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">
                                                    Глубина
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">
                                                    Проём
                                                </div>
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">
                                                    <input type="text" class="form-control" placeholder="мм">
                                                </div>
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">
                                                    <input type="text" class="form-control" placeholder="мм">
                                                </div>
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">
                                                    <input type="text" class="form-control" placeholder="мм">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">
                                                    Коробка
                                                </div>
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">
                                                    <input type="text" class="form-control" placeholder="мм">
                                                </div>
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">
                                                    <input type="text" class="form-control" placeholder="мм">
                                                </div>
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">
                                                    <input type="text" class="form-control" placeholder="мм">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">
                                                    Полотно
                                                </div>
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">
                                                    <input type="text" class="form-control" placeholder="мм">
                                                </div>
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">
                                                    <input type="text" class="form-control" placeholder="мм">
                                                </div>
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">
                                                    <input type="text" class="form-control" placeholder="мм">
                                                </div>
                                            </div>
                                        </label>

                                    </div>
                                    <div class="col-xs-12 col-sm-12 co1 -md-6 col-lg-6">
                                        <label>
                                           Коробочный продукт:
                                        </label>
                                        <div class="form-group services">
                                            <select name="services" class="form-control" id="boxId">
                                                <?php foreach ($serviceBox as $one):?>
                                                    <option value="<?=$one['id']?>"> <?=$one['name']?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <input class="form-control counter" type="number" placeholder="шт" id="boxCounter">
                                            <?= Html::button('+', ['class' => 'btn btn-master', 'id' => 's-service'])?>
                                        </div>
                                        <ul class="list-group">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Первая услуга
                                                <span class="badge badge-primary badge-pill">
                                                    <span id="serviceCounter-1"></span>
                                                    X
                                                    <span id="priceCounter-1"></span>
                                                </span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Вторая услуга
                                                <span class="badge badge-primary badge-pill">
                                                    <span id="serviceCounter-2">3</span>
                                                    X
                                                    <span id="priceCounter-2">2</span> Р
                                            </li>
                                        </ul>

                                        <hr>

                                        <label>
                                            Дополнительные услуги:
                                        </label>

                                        <div class="form-group services">
                                            <select name="services" class="form-control" id="serviceId">
                                                <?php foreach ($service as $one):?>
                                                <option value="<?=$one['id']?>"> <?=$one['name']?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <input class="form-control counter" type="number" placeholder="шт" id="serviceCounter">
                                            <?= Html::button('+', ['class' => 'btn btn-master', 'id' => 'dop_service'])?>
                                        </div>
                                        <ul class="list-group">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Первая услуга
                                                <span class="badge badge-primary badge-pill">
                                                    <span id="serviceCounter-1"></span>
                                                    X
                                                    <span id="priceCounter-1"></span>
                                                </span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Вторая услуга
                                                <span class="badge badge-primary badge-pill">
                                                    <span id="serviceCounter-2">3</span>
                                                    X
                                                    <span id="priceCounter-2">2</span> Р
                                            </li>
                                        </ul>

                                        <hr>

                                        <label>
                                            Расходные материалы:
                                        </label>

                                        <div class="form-group services">
                                            <select name="services" class="form-control" id="materialId">
                                                <?php foreach ($other as $one):?>
                                                <option value="<?=$one['id']?>"><?=$one->name?></option>
                                                <?php endforeach;?>
                                                <option value="1"></option>
                                            </select>
                                            <input class="form-control counter" type="number" placeholder="шт" id="materialCounter">
                                            <?= Html::button('+', ['class' => 'btn btn-master', 'id' => 'p-service'])?>
                                        </div>

                                        <ul class="list-group">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Первый материал
                                                <span class="badge badge-primary badge-pill">
                                                    <span id="materialCounter-1">14</span>
                                                    X
                                                    <span id="materialPriceCounter-1">500</span> Р
                                                </span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Второй материал
                                                <span class="badge badge-primary badge-pill">
                                                    <span id="materialCounter-2">3</span>
                                                    X
                                                    <span id="materialPriceCounter-2">2</span> Р
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="save-door__button">
                                    <?= Html::submitButton('Сохранить настройки двери', ['class' => 'btn btn-master', 'id' => 'go_go_go']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $form->field($doors, 'serviceDoors')->hiddenInput()->label(false) ?>

    <?php ActiveForm::end(); ?>
</div>

<script>
    let serviceList = [];
    // клик по услугам
    $( "#dop_service" ).click( function() {
        let serviceId = $('#serviceId').val();
        let serviceCounter = $('#serviceCounter').val();
        if (parseInt(serviceCounter) > 0) {
            serviceList.push({
                id: serviceId,
                value: serviceCounter
            })
        }
        console.log(serviceList)
    });
    // клик по материалам
    $( "#p-service" ).click( function() {
        let materialId = $('#materialId').val();
        let materialCounter = $('#materialCounter').val();
        if (parseInt(materialCounter) > 0) {
            serviceList.push({
                id: materialId,
                value: materialCounter
            })
        }
        console.log(serviceList)
    });
    // клик по коробочному продукту
    $( "#s-service" ).click( function() {
        let boxId = $('#boxId').val();
        let boxCounter = $('#boxCounter').val();
        if (parseInt(boxCounter) > 0) {
            serviceList.push({
                id: boxId,
                value: boxCounter
            })
        }
        console.log(serviceList)
    });
</script>
