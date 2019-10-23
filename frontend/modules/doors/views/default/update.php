<?php

use yii\helpers\Html;
use frontend\modules\doors\models\Doors;
use frontend\modules\doors\models\Clients;
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
                <?= $form->field($client, 'address')->textInput() ?>
            </div>
            <div class="col-xs-12 col-sm-12 co12-md-6 col-lg-6">
                <?= $form->field($client, 'FIO')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 co12-md-6 col-lg-6">
                <?= $form->field($client, 'telephone')->textInput(['maxlength'=>11]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 co12-md-12 col-lg-12">
                <?=$form->field($client,'type_elevator')->dropDownList([
                    Clients::TYPE_ELEVATOR_PASSENGER    =>  'Пассажирский',
                    Clients::TYPE_ELEVATOR_GOODS        =>  'Грузовой',
                    Clients::TYPE_ELEVATOR_FALSE        =>  'Лифт отсутствует',
                ])?>
            </div>
            <div class="col-xs-12 col-sm-12 co12-md-12 col-lg-12">
                <?= $form->field($client, 'comment')->textarea() ?>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-12 co12-md-12 col-lg-12">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    Дверь
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
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
                                        Doors::ADHERENCE_INTERIOR_LEFT      => Html::img('/image/right_doors_1.svg', ['width' => '100%', 'height' => 150]),
                                        Doors::ADHERENCE_INTERIOR_RIGHT     => Html::img('/image/left_doors.svg',['width' => '100%', 'height' => 150]),
                                        Doors::ADHERENCE_OUTDOOR_LEFT       => Html::img('/image/right_doors_1.svg', ['width' => '100%', 'height' => 150]),
                                        Doors::ADHERENCE_OUTDOOR_RIGHT      => Html::img('/image/left_doors.svg',['width' => '100%', 'height' => 150]),
                                    ], ['encode' => false])->label(false)
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-master']) ?>
    </div>

    <?php ActiveForm::end(); ?>

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

    // клик по X

    $('.list-group').on('click', '.badge-master', function() {
        // узнаем какая дверь
        let doorIndex = $(this).parent().parent().attr('data-list')
        // узнаем id удаленной услуги
        let deletedServiceId = $(this).attr('data-click')
        let currentServicesList = serviceList[doorIndex];
        for (let i = 0; i < currentServicesList.serviceList.length; i++){
            if (currentServicesList.serviceList[i].id === deletedServiceId) {
                serviceList[doorIndex].serviceList.splice(i, 1)
            }
        }
        $(this).parent().remove();
    });
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
            console.log(serviceList)
            let list = this.parentNode.parentNode.children[6]
            $(list).append('<li class="list-group-item d-flex justify-content-between align-items-center">\n' + serviceText +
                '                                <span data-click="' + serviceId + '" class="badge badge-primary badge-master badge-pill">\n' +
                '                                  <span>' + 'X' +'</span></span>\n' +
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
                '                                <span data-click="' + materialId + '"  class="badge badge-primary badge-master badge-pill">\n' +
                '                                  <span>' + 'X' +'</span></span>\n' +
                '                                <span class="badge badge-primary badge-pill">\n' +
                '                                  <span>' + materialCounter +'</span></span>\n' +
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
                '                                <span  data-click="' + boxId + '" class="badge badge-primary badge-master badge-pill">\n' +
                '                                  <span>' + 'X' +'</span></span>\n' +
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

