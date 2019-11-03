<?php

/* @var $door frontend\modules\doors\models\Doors*/

use common\models\User;
use frontend\modules\doors\models\Doors;
use \frontend\modules\doors\models\Clients;
use frontend\modules\doors\models\ServicePrice;

$this->title = "Заказ № {$door->id}";
$date = strtotime($door->date_create);

?>
<div class="ticket-info">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 co1-md-12 col-lg-12">
                <?php if (Yii::$app->user->identity->status === User::STATUS_ADMIN):?>
                <div class="ticket-info__button">
                    <button onclick="window.location='<?=\yii\helpers\Url::toRoute('update/'.$door->id)?>'" class="btn btn-master">Редактировать</button>
                </div>
                <?php endif?>
            </div>
            <div class="col-xs-12 col-sm-12 co1-md-12 col-lg-12">
                <div class="ticket-info__button">
                    <button onclick="window.location='<?=\yii\helpers\Url::toRoute('all')?>'" class="btn btn-master">Назад</button>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 co1-md-6 col-lg-6">
                <div class="ticket-info__personal">
                    <h3>Общая информация о заказчике</h3>
                    <div>
                        <strong>Заказ №: </strong><span><?=$door->id?></span>
                    </div>
                    <div>
                        <strong>Cотрудник: </strong><?=$door->author->username?>
                    </div>
                    <div>
                        <strong>Дата оформления:</strong><?=date('Y-m-d',$date)?>
                    </div>
                    <div>
                        <strong>Заказчик:</strong><?=$door->client->FIO?>
                    </div>
                    <div>
                        <strong>Телефон:</strong><?=$door->client->telephone?>
                    </div>
                    <div>
                        <strong>Адрес: </strong><?=$door->client->address?>
                    </div>
                    <div>
                        <strong>Тип лифта: </strong><?php if ($door->client->type_elevator===Clients::TYPE_ELEVATOR_FALSE){
                            echo "Лифт отсутствует";
                        }elseif ($door->client->type_elevator===Clients::TYPE_ELEVATOR_PASSENGER){
                            echo "Пассажирский";
                        }else echo 'Грузовой'?>
                    </div>
                    <div>
                        <strong>Комментарий: </strong><?=$door->client->comment?>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 co1-md-6 col-lg-6">
                <div class="ticket-info__personal">
                    <h3>Информация о дверях</h3>
                    <div>
                        <strong>Тип устанавливаемой двери: </strong> <?= $door->type_doors ==Doors::TYPE_DOORS_INTERIOR ?  "Межкомнатная" : "Металлическая"?>
                    </div>
                    <div>
                        <strong>Комментарий: </strong> <?=$door->comment?>
                    </div>
                    <div>
                        <strong>Материал стен: </strong><?=$door->wall_material?>
                    </div>
                    <div class="storona storona-<?=$door->adherence?>">
                        <strong>Сторонность: </strong>
                        <?= \yii\helpers\Html::img('/image/left_doors.svg')?>
                    </div>
                    <div class="proem proem-<?=$door->type_opening?>">
                        <strong>Вид проема: </strong>
                        <!--НУЖНО ВСТАВЛЯТЬ КАРТИНКУ В ЗАВИСИМОСТИ ОТ ВЫБРАННОГО ПРОЕМА  -->
                        <?php if ($door->type_doors === Doors::TYPE_OPENING_MID){
                           echo \yii\helpers\Html::img('/image/middle.jpg');
                        }if ($door->type_doors === Doors::TYPE_OPENING_LEFT) {
                            echo \yii\helpers\Html::img('/image/left.jpg');
                        }if ($door->type_doors === Doors::TYPE_OPENING_RIGHT){
                            echo \yii\helpers\Html::img('/image/right.jpg');
                        }
                        if($door->type_doors === Doors::TYPE_OPENING_OFF){
                            echo \yii\helpers\Html::img('/image/off.jpg');
                        }
                        ?>
                    </div>
                    <div>
                        <strong>Доп услуги: </strong>
                        <ul>
                            <?php foreach ($door->servicesDoors as $value):?>
                                <?php $service = ServicePrice::findOne($value['id_service'])?>
                            <li><?=$service->name?>(<?=$value->count_service?> шт Х <?=$service->price?>р) [<?=$service->price * $value->count_service?>]</li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <div>
                        <strong>Габариты проёма, коробки, полотна (ВхШхГ): </strong>
                        <div>Проём : <?=$door->height_aperture?> x <?=$door->width_aperture?> x <?=$door->depth_aperture?> мм</div>
                        <div>Коробка: <?=$door->height_box?>x <?=$door->width_box?>x <?=$door->depth_box?> мм</div>
                        <div>Полотно : <?=$door->height_canvas?> x <?=$door->width_canvas?> x <?=$door->depth_canvas?> мм</div>
                    </div>
                    <div>
                        <strong>Цена: <?=$door->sum?></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>