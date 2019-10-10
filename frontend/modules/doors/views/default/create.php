<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\modules\doors\models\Doors;
use frontend\modules\doors\models\Clients;

/* @var $this yii\web\View */
/* @var $client frontend\modules\doors\models\Clients*/
/* @var $door frontend\modules\doors\models\Doors */
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
                    <button class="btn btn-master" id="addDoor">Добавить дверь</button>
                </div>
                <div class="panel-group" id="accordion">
                    
                    
                    
                    <?php foreach ($allDoors as $k => $door) : ?>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$k?>">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Дверь <?=$k+1?>
                                </h4>
                            </div>
                        </a>
                        <div id="collapse<?=$k?>" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 co1-md-6 col-lg-6">
                                        <?= $form->field($door, "[{$k}]type_doors")->dropDownList([
                                            Doors::TYPE_DOORS_IRON =>'Металическая',
                                            Doors::TYPE_DOORS_INTERIOR =>'Межкомнатная'
                                        ]) ?>
                                        <?= $form->field($door, "[{$k}]comment")->textarea() ?>

                                        <hr>

                                <div>
                                    <label>Материал стен:</label>
                                    <?= $form->field($door, "[{$k}]wall_material")->radioList([
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

                                        <div class="max-slomal-stili">
                                            <label>Вид проема в плане:</label>
                                            <?=$form->field($door, "[{$k}]type_opening")->radioList([
                                                Doors::TYPE_OPENING_MID   => Html::img('/image/mid_doors.svg', ['width' => '100%', 'height' => 150]) ,
                                                Doors::TYPE_OPENING_LEFT  => Html::img('/image/left_doors_1.svg',['width' => '100%', 'height' => 150]) ,
                                                Doors::TYPE_OPENING_RIGHT => Html::img('/image/right_doors.svg' ,['width' => '100%', 'height' => 150])
                                            ], ['encode' => false])->label(false)
                                            ?>
                                        </div>

                                        <hr>

                                        <div class="max-slomal-stili2">
                                            <label>Сторонность:</label>
                                            <?=$form->field($door, "[{$k}]adherence")->radioList([
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
                                                    <?=$form->field($door, "[{$k}]height_aperture")->textInput(['placeholder'=>'мм'])->label(false)?>
                                                </div>
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">
                                                    <?=$form->field($door, "[{$k}]width_aperture")->textInput(['placeholder'=>'мм'])->label(false)?>
                                                </div>
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">
                                                    <?=$form->field($door, "[{$k}]depth_aperture")->textInput(['placeholder'=>'мм'])->label(false)?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">
                                                    Коробка
                                                </div>
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">
                                                    <?=$form->field($door, "[{$k}]height_box")->textInput(['placeholder'=>'мм'])->label(false)?>
                                                </div>
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">
                                                    <?=$form->field($door, "[{$k}]width_box")->textInput(['placeholder'=>'мм'])->label(false)?>
                                                </div>
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">
                                                    <?=$form->field($door, "[{$k}]depth_box")->textInput(['placeholder'=>'мм'])->label(false)?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">
                                                    Полотно
                                                </div>
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">
                                                    <?=$form->field($door, "[{$k}]height_canvas")->textInput(['placeholder'=>'мм'])->label(false)?>
                                                </div>
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">
                                                    <?=$form->field($door, "[{$k}]width_canvas")->textInput(['placeholder'=>'мм'])->label(false)?>
                                                </div>
                                                <div class="col-xs-3 col-sm-3 co1-md-3 col-lg-3">
                                                    <?=$form->field($door, "[{$k}]depth_canvas")->textInput(['placeholder'=>'мм'])->label(false)?>
                                                </div>
                                            </div>
                                        </label>

                                    </div>
                                    <div class="col-xs-12 col-sm-12 co1 -md-6 col-lg-6">
                                        <label>
                                           Коробочный продукт:
                                        </label>
                                        <div class="form-group services">
                                            <select name="services" class="form-control" id="boxId<?=$k?>">
                                                <?php foreach ($serviceBox as $one):?>
                                                    <option value="<?=$one['id']?>"> <?=$one['name']?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <input class="form-control counter" type="number" placeholder="шт" id="boxCounter<?=$k?>">
                                            <?= Html::button('+', ['class' => 'btn btn-master s-service', 'id' => 's-service', 'data-index' => $k])?>
                                        </div>
                                        <ul class="list-group">
                                            <!-- cюда генерятся итемы -->
                                        </ul>

                                        <hr>

                                        <label>
                                            Дополнительные услуги:
                                        </label>

                                        <div class="form-group services">
                                            <select name="services" class="form-control" id="serviceId<?=$k?>">
                                                <?php foreach ($service as $one):?>
                                                <option value="<?=$one['id']?>"> <?=$one['name']?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <input class="form-control counter" type="number" placeholder="шт" id="serviceCounter<?=$k?>">
                                            <?= Html::button('+', ['class' => 'btn btn-master dop_service', 'id' => 'dop_service', 'data-index' => $k])?>
                                        </div>
                                        <ul class="list-group">
                                            <!-- cюда генерятся итемы -->
                                        </ul>

                                        <hr>

                                        <label>
                                            Расходные материалы:
                                        </label>

                                        <div class="form-group services">
                                            <select name="services" class="form-control" id="materialId<?=$k?>">
                                                <?php foreach ($other as $one):?>
                                                <option value="<?=$one['id']?>"><?=$one->name?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <input class="form-control counter" type="number" placeholder="шт" id="materialCounter<?=$k?>">
                                            <?= Html::button('+', ['class' => 'btn btn-master p-service', 'id' => 'p-service', 'data-index' => $k])?>
                                        </div>

                                        <ul class="list-group">
                                            <!-- cюда генерятся итемы -->
<!--                                            <li class="list-group-item d-flex justify-content-between align-items-center">-->
<!--                                                Второй материал-->
<!--                                                <span class="badge badge-primary badge-pill">-->
<!--                                                    <span id="materialCounter-2">3</span>-->
<!--                                                    X-->
<!--                                                    <span id="materialPriceCounter-2">2</span> Р-->
<!--                                            </li>-->
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                        <?= $form->field($door, "[{$k}]serviceDoors[]")->hiddenInput(['class' => 'doors-servicedoors'])->label(false) ?>
                    <div class="doors-for-fio" style="visibility: hidden">
                        <?= $form->field($door, "[{$k}]clientName")->hiddenInput(['сlass' => 'client-doors doors-for-fio'])->label(false) ?>
                    </div>
                    <?php endforeach;?>
                    <div class="save-door__button">
                        <?= Html::submitButton('Сохранить заказ', ['class' => 'btn btn-master', 'id' => 'go_go_go']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    let serviceList = [
        {serviceList: []},
        {serviceList: []},
        {serviceList: []},
        {serviceList: []},
        {serviceList: []},
        {serviceList: []},
        {serviceList: []},
        {serviceList: []},
        {serviceList: []},
        {serviceList: []},
    ];

    $( document ).ready(function() {
        $('#collapse0').addClass('in')
    });

    // клик по Добавить дверь
    // $( "#addDoor" ).click( function() {
    //     $('#accordion').append('<p>Меня тут не было!</p>');
    //
    // });
    // клик по услугам
    $( ".dop_service" ).click( function() {
        let elemIndex = this.getAttribute('data-index');
        let elem = $('#serviceId' + elemIndex)
        let serviceId = elem.val();
        let serviceText = elem.find('option:selected').text();
        let serviceCounter = $('#serviceCounter' + elemIndex).val();
        if (parseInt(serviceCounter) > 0) {
            serviceList[elemIndex].serviceList.push({
                id: serviceId,
                value: serviceCounter
            })
            let list = this.parentNode.parentNode.children[6]
            console.log(this.parentNode.parentNode.children)
            $(list).append('<li class="list-group-item d-flex justify-content-between align-items-center">\n' + serviceText +
                '                                <span class="badge badge-primary badge-pill">\n' +
                '                                  <span>' + serviceCounter +'</span>\n' +
                '                            </li>');
        }
    });
    // клик по материалам
    $( ".p-service" ).click( function() {
        let elemIndex = this.getAttribute('data-index');
        let elem = $('#materialId' + elemIndex);
        let materialId = elem.val();
        let materialText = elem.find('option:selected').text();
        let materialCounter = $('#materialCounter' + elemIndex).val();
        if (parseInt(materialCounter) > 0) {
            serviceList[elemIndex].serviceList.push({
                id: materialId,
                value: materialCounter
            })
            let list = this.parentNode.parentNode.children[10]
            $(list).append('<li class="list-group-item d-flex justify-content-between align-items-center">\n' + materialText +
                '                                <span class="badge badge-primary badge-pill">\n' +
                '                                  <span>' + materialCounter +'</span>\n' +
                '                            </li>');
        }
    });
    // клик по коробочному продукту
    $( ".s-service" ).click( function() {
        let elemIndex = this.getAttribute('data-index');
        let elem = $('#boxId' + elemIndex);
        let boxId = elem.val();
        let boxText = elem.find('option:selected').text();
        let boxCounter = $('#boxCounter' + elemIndex).val();
        if (parseInt(boxCounter) > 0) {
            serviceList[elemIndex].serviceList.push({
                id: boxId,
                value: boxCounter
            })
            let list = this.parentNode.parentNode.children[2]
            $(list).append('<li class="list-group-item d-flex justify-content-between align-items-center">\n' + boxText +
'                                <span class="badge badge-primary badge-pill">\n' +
'                                  <span>' + boxCounter +'</span>\n' +
'                            </li>');
        }
    });
    // клик по сохранить
    $( "#go_go_go" ).click( function() {
        let hiddenInputs = $('.doors-servicedoors');
        for (let i = 0; i < hiddenInputs.length; i++) {
            if (serviceList[i].serviceList.length > 0){
                hiddenInputs[i].value = JSON.stringify(serviceList[i].serviceList)
            }
        }

        let clientFio = $('#clients-fio');

        let hiddenInputsFio = $('.doors-for-fio').children().children()
        for (let i = 0; i < hiddenInputsFio.length; i++) {
            if (i % 2 === 0){
                hiddenInputsFio[i].value = JSON.stringify(clientFio[0].value)
            }
        }
    });

</script>
