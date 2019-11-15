<?php

/* @var $order frontend\modules\doors\models\Orders*/

use common\models\User;
use frontend\modules\doors\models\Doors;
use \frontend\modules\doors\models\Clients;
use frontend\modules\doors\models\ServicePrice;

$price=0;
?>
<div class="service-price-form">
    <div class="container">
        <?php if (Yii::$app->user->identity->status !== User::STATUS_MANAGER):?>

            <div class="ticket-info__button">
                <?php foreach ($order as $value):?>
                    <button onclick="window.location='<?=\yii\helpers\Url::toRoute('order-update/'.$value->id_order)?>'" class="btn btn-master">Редактировать</button>
                    <?php break;?>
                <?php endforeach;?>
            </div>
        <?php endif?>
        <div class="col-xs-12 col-sm-12 co1-md-12 col-lg-12">
            <div class="ticket-info__button">
                <button onclick="window.location='<?=\yii\helpers\Url::toRoute('all')?>'" class="btn btn-master">Назад</button>
            </div>
        </div>
        <div class="row">
            <!--Клиенты-->
            <?php foreach ($order as $value):?>
            <div class="col-xs-12 col-sm-12 co1-md-12 col-lg-12">
                <h3>Общая информация о заказчике: </h3>
                <strong>Адрес: </strong><?=$value->client->address?>
            </div>
            <div class="col-xs-12 col-sm-12 co1-md-6 col-lg-6">
                <strong>Заказ №: </strong><span><?=$value->client->id?></span>
            </div>
            <div class="col-xs-12 col-sm-12 co1-md-6 col-lg-6">
                <strong>Заказчик:</strong><?=$value->client->FIO?>
            </div>
            <div class="col-xs-12 col-sm-12 co1-md-6 col-lg-6">
                <strong>Cотрудник:</strong><?=$value->author->username?>
            </div>
            <div class="col-xs-12 col-sm-12 co1-md-6 col-lg-6">
                <strong>Дата оформления:</strong><?=date('Y-m-d',strtotime($value->date_create))?>
            </div>
            <div class="col-xs-12 col-sm-12 co1-md-6 col-lg-6">
                <strong>Телефон:</strong><?=$value->client->telephone?>
            </div>
            <div class="col-xs-12 col-sm-12 co1-md-12 col-lg-12">
                <strong>Тип лифта: </strong><?php if ($value->client->type_elevator===Clients::TYPE_ELEVATOR_FALSE) {
                    echo "Лифт отсутствует";
                } elseif ($value->client->type_elevator===Clients::TYPE_ELEVATOR_PASSENGER) {
                    echo "Пассажирский";
                } else echo 'Грузовой'?>
            </div>
            <div class="col-xs-12 col-sm-12 co1-md-12 col-lg-12">
                <strong>Комментарий: </strong><?=$value->client->comment?>
            </div>
                <?php break;?>
            <?php endforeach;?>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="door-header">
                    <h1>Информация о заказе:</h1>
                </div>
                <div class="panel-group" id="accordion">
                    <?php foreach ($order as $key => $value):?>
                        <div class="panel panel-default">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$key?>">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        Дверь <?=$key+1?>
                                    </h4>
                                </div>
                            </a>
                            <div id="collapse<?=$key?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 co1-md-6 col-lg-6">
                                            <div>
                                                <strong>Тип устанавливаемой двери: </strong> <?= $order[$key]['doors'][0]['type_doors']==Doors::TYPE_DOORS_INTERIOR ?  "Межкомнатная" : "Металлическая"?>
                                            </div>
                                            <hr>

                                            <div>
                                                <strong>Комментарий: </strong> <?=$order[$key]['doors'][0]['comment']?>
                                            </div>

                                            <hr>

                                            <div>
                                                <strong>Материал стен: </strong><?=$order[$key]['doors'][0]['wall_material']?>
                                            </div>

                                            <hr>
                                                <div class="proem proem-<?=$order[$key]['doors'][0]['type_opening']?>">
                                                    <strong>Вид проема: </strong>
                                                    <?php if ($order[$key]['doors'][0]['type_opening'] === Doors::TYPE_OPENING_MID) {
                                                        echo \yii\helpers\Html::img('/image/middle.jpg');
                                                    } if ($order[$key]['doors'][0]['type_opening'] === Doors::TYPE_OPENING_LEFT) {
                                                        echo \yii\helpers\Html::img('/image/left.jpg');
                                                    } if ($order[$key]['doors'][0]['type_opening'] === Doors::TYPE_OPENING_RIGHT) {
                                                        echo \yii\helpers\Html::img('/image/right.jpg');
                                                    } if($order[$key]['doors'][0]['type_opening'] === Doors::TYPE_OPENING_OFF) {
                                                        echo \yii\helpers\Html::img('/image/off.jpg');
                                                    }?>
                                                </div>

                                            <hr>

                                            <div class="storona storona-<?=$order[$key]['doors'][0]['adherence']?>">
                                                <strong>Сторонность: </strong>
                                                <?= \yii\helpers\Html::img('/image/left_doors.svg')?>
                                            </div>

                                            <hr>

                                            <div>
                                                <strong>Габариты проёма, коробки, полотна (ВхШхГ): </strong>
                                                <div>Проём : <?=$order[$key]['doors'][0]['height_aperture']?> x <?=$order[$key]['doors'][0]['width_aperture']?> x <?=$order[$key]['doors'][0]['depth_aperture']?> мм</div>
                                                <div>Коробка: <?=$order[$key]['doors'][0]['height_box']?>x <?=$order[$key]['doors'][0]['width_box']?>x <?=$order[$key]['doors'][0]['depth_box']?> мм</div>
                                                <div>Полотно : <?=$order[$key]['doors'][0]['height_canvas']?> x <?=$order[$key]['doors'][0]['width_canvas']?> x <?=$order[$key]['doors'][0]['depth_canvas']?> мм</div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 co1 -md-6 col-lg-6">
                                            <div>
                                                <strong>Доп услуги: </strong>
                                                <ul>
                                                    <?php foreach ($order[$key]->services as $item):?>
                                                        <?php $service = ServicePrice::findOne($item['id_service'])?>
                                                        <li>
                                                            <?=$service->name?>(<?=$item['count_service']?> шт Х
                                                            <?=$service->price?> р)
                                                            [<?=$service->price * $item['count_service']?>]
                                                        </li>
                                                    <?php endforeach;?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 co1 -md-6 col-lg-6">
                                            <strong>Цена двери: <?=$order[$key]['doors'][0]['sum']?></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
            <?php foreach ($order as $key => $value) {
                $price +=$order[$key]['doors'][0]['sum'];
            }?>

            <div class="col-xs-12 col-sm-12 co1 -md-6 col-lg-6">
                <strong>Цена заказа: <?= $price?></strong>
            </div>
        </div>
    </div>
</div>

<script>
    $( document ).ready(function() {
        $('#collapse0').addClass('in')
    });
</script>
