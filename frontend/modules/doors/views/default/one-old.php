<?php

/* @var $door frontend\modules\doors\models\Doors*/

use \frontend\modules\doors\models\OldDoors;

$this->title = "Заказ № {$door->id}";
$date = strtotime($door->date);

?>
<div class="ticket-info">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 co1-md-12 col-lg-12">
                <div class="ticket-info__button">
                    <button onclick="window.location='<?=\yii\helpers\Url::toRoute('all-old')?>'" class="btn btn-master">Назад</button>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 co1-md-6 col-lg-6">
                <div class="ticket-info__personal">
                    <h3>Общая информация о заказчике</h3>
                    <div>
                        <strong>Заказ №: </strong><span><?=$door->id?></span>
                    </div>
                    <div>
                        <strong>Cотрудник: </strong><?=$door->login?>
                    </div>
                    <div>
                        <strong>Дата оформления:</strong><?=date('Y-m-d',$date)?>
                    </div>
                    <div>
                        <strong>Заказчик:</strong><?=$door->client_name?>
                    </div>
                    <div>
                        <strong>Телефон:</strong><?=$door->client_phone?>
                    </div>
                    <div>
                        <strong>Адрес: </strong><?= !empty($door->client_street) ? 'Улица:'.$door->client_street .PHP_EOL.'Дом:'.$door->client_house .PHP_EOL.'Квартира:'.$door->client_apartment: '' ?>
                    </div>
                    <div>
                        <strong>Комментарий: </strong><?=$door->client_comment?>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 co1-md-6 col-lg-6">
                <div class="ticket-info__personal">
                    <h3>Информация о дверях</h3>
                    <div>
                        <strong>Тип устанавливаемой двери: </strong> <?= $door->Type_of_door_installed == OldDoors::TYPE_DOORS_INTERIOR ?  "Межкомнатная" : "Металлическая"?>
                    </div>
                    <div>
                        <strong>Комментарий: </strong> <?=$door->Comment_door_name?>
                    </div>
                    <div>
                        <strong>Материал стен: </strong><?=$door->Wall_material?>
                    </div>
                    <div class="storona storona-<?=$door->Handiness?>">
                        <strong>Сторонность: </strong>
                        <?= \yii\helpers\Html::img('/image/left_doors.svg')?>
                    </div>
                    <div class="proem proem-<?=$door->Type_opening_in_plan?>">
                        <strong>Вид проема: </strong>
                        <!--НУЖНО ВСТАВЛЯТЬ КАРТИНКУ В ЗАВИСИМОСТИ ОТ ВЫБРАННОГО ПРОЕМА  -->
                        <?=$door->Type_opening_in_plan?>
                        <?= \yii\helpers\Html::img('/image/mid_doors.svg')?>
                    </div>
                    <div>
                        <strong>Доп услуги: </strong>
                        <ul>
                            <?php if ($door->Dismantling_the_old_wooden_door >= 1):?>
                                <br>
                                <?php echo'Демонтаж старой деревянной двери:'.PHP_EOL.
                                    $door->Dismantling_the_old_wooden_door?>
                            <?php endif?>
                            <?php if ($door->Dismantling_the_old_metal_door_meth >= 1):?>
                                <br>
                                <?php echo'Демонтаж старой металлической двери (мет):'.PHP_EOL.
                                    $door->Dismantling_the_old_metal_door_meth?>
                            <?php endif?>
                            <?php if ($door->Correction_for_complexity_floor_met >= 1):?>
                                <br>
                                <?php echo'Поправка на сложность (этаж) (мет):'.PHP_EOL.
                                    $door->Correction_for_complexity_floor_met?>
                                <?php echo 'Комментарий по поправке на сложность'.PHP_EOL.
                                    $door->Comment_on_the_amendment_to_the_complexity?>
                            <?php endif?>
                            <?php if ($door->Clearance_opening >= 1):?>
                                <?php echo'Оформление проема:'.PHP_EOL.
                                    $door->Clearance_opening?>
                            <?php endif?>
                            <?php if ($door->Cut_box >= 1):?>
                                <?php echo'Распил короба:'.PHP_EOL.
                                    $door->Cut_box?>
                            <?php endif?>
                            <?php if ($door->Cut_saw >= 1):?>
                                <?php echo'Распил полотна:'.PHP_EOL.
                                    $door->Cut_saw?>
                            <?php endif?>
                            <?php if ($door->Cut_platband >= 1):?>
                                <br>
                                <?php echo'Распил наличника:'.PHP_EOL.
                                    $door->Cut_platband?>
                            <?php endif?>
                            <?php if ($door->Expansion_opening>= 1):?>
                                <?php echo'Расширение проема:'.PHP_EOL.
                                    $door->Expansion_opening?>
                                <?php echo 'Комментарий к расширению проема:'.PHP_EOL.
                                    $door->Comment_on_the_expansion_of_the_opening?>
                            <?php endif?>
                            <?php if ($door->Reducing_the_opening_without_the_cost_of_materials >= 1):?>
                                <br>
                                <?php echo'Уменьшение проема без стоимости материалов:'.PHP_EOL.
                                    $door->Reducing_the_opening_without_the_cost_of_materials?>
                            <?php endif?>
                            <?php if ($door->Double_box_installation >= 1):?>
                                <br>
                                <?php echo'Установка двухстворчатой коробки:'.PHP_EOL.
                                    $door->Double_box_installation?>
                            <?php endif?>
                            <?php if ($door->Mortise_lock_installation >= 1):?>
                                <?php echo'Установка врезного замка:'.PHP_EOL.
                                    $door->Mortise_lock_installation?>
                            <?php endif?>
                            <?php if ($door->Door_installation >= 1):?>
                                <?php echo'Установка двери:'.PHP_EOL.
                                    $door->Door_installation?>
                            <?php endif?>
                            <?php if ($door->Metal_Door_installation >= 1):?>
                                <?php echo'Установка металлической двери:'.PHP_EOL.
                                    $door->Metal_Door_installation?>
                            <?php endif?>
                            <?php if ($door->Door_frame_installation >= 1):?>
                                <?php echo'Установка дверной коробки:'.PHP_EOL.
                                    $door->Door_frame_installation?>
                            <?php endif?>
                            <?php if ($door->Installation_of_an_additional_element_more_than_7cm >= 1):?>
                                <?php echo'Установка доборного элемента более 7см:'.PHP_EOL.
                                    $door->Installation_of_an_additional_element_more_than_7cm?>
                            <?php endif?>
                            <?php if ($door->Installation_of_an_additional_element_up_to_7cm >= 1):?>
                                <?php echo'Установка доборного элемента до 7см:'.PHP_EOL.
                                    $door->Installation_of_an_additional_element_up_to_7cm?>
                            <?php endif?>
                            <?php if ($door->Closer_Installation >= 1):?>
                                <?php echo'Установка доводчика:'.PHP_EOL.
                                    $door->Closer_Installation?>
                            <?php endif?>
                            <?php if ($door->Installation_of_additional_fasteners >= 1):?>
                                <?php echo'Установка дополнительного крепежа:'.PHP_EOL.
                                    $door->Installation_of_additional_fasteners?>
                            <?php endif?>
                            <?php if ($door->Installation_of_additional_fasteners_met >= 1):?>
                                <?php echo'Установка дополнительного крепежа (мет):'.PHP_EOL.
                                    $door->Installation_of_additional_fasteners_met?>
                            <?php endif?>
                            <?php if ($door->Installing_the_lock_compartment >= 1):?>
                                <?php echo'Установка замка купе:'.PHP_EOL.
                                    $door->Installing_the_lock_compartment?>
                            <?php endif?>
                            <?php if ($door->Installing_the_sliding_door_mechanism >= 1):?>
                                <?php echo'Установка механизма раздвижной двери:'.PHP_EOL.
                                    $door->Installing_the_sliding_door_mechanism?>
                            <?php endif?>
                            <?php if ($door->Installation_of_the_padlock >= 1):?>
                                <?php echo'Установка накладного замка:'.PHP_EOL.
                                    $door->Installation_of_the_padlock?>
                            <?php endif?>
                            <?php if ($door->Installing_the_casing_on_one_side >= 1):?>
                                <?php echo'Установка наличника с одной стороны:'.PHP_EOL.
                                    $door->Installing_the_casing_on_one_side?>
                            <?php endif?>
                            <?php if ($door->Installation_of_one_canopy >= 1):?>
                                <?php echo'Установка одного навеса:'.PHP_EOL.
                                    $door->Installation_of_one_canopy?>
                            <?php endif?>
                            <?php if ($door->Plastic_accordion_installation >= 1):?>
                                <?php echo'Установка пластиковой гармошки:'.PHP_EOL.
                                    $door->Plastic_accordion_installation?>
                            <?php endif?>
                            <?php if ($door->Setting_threshold >= 1):?>
                                <?php echo'Установка порога:'.PHP_EOL.
                                    $door->Setting_threshold?>
                            <?php endif?>
                            <?php if ($door->Installing_the_visor_meth >= 1):?>
                                <?php echo'Установка козырька (мет):'.PHP_EOL.
                                    $door->Installing_the_visor_meth?>
                            <?php endif?>
                            <?php if ($door->Installation_of_cable_in_the_door_box >= 1):?>
                                <?php echo'Монтаж кабеля в короб двери:'.PHP_EOL.
                                    $door->Installation_of_cable_in_the_door_box?>
                            <?php endif?>
                            <?php if ($door->Installation_of_secret_fixture_of_a_box >= 1):?>
                                <?php echo'Установка потайного крепежа короба:'.PHP_EOL.
                                    $door->Installation_of_secret_fixture_of_a_box?>
                            <?php endif?>
                            <?php if ($door->Installing_the_latch_knob >= 1):?>
                                <?php echo'Установка ручки-защелки:'.PHP_EOL.
                                    $door->Installing_the_latch_knob?>
                            <?php endif?>
                            <?php if ($door->Remoteness >= 1):?>
                                <?php echo'Отдаленность:'.PHP_EOL.
                                    $door->Remoteness?>
                                <?php echo ':'.PHP_EOL.
                                    $door->Remoteness_comment
                                ?>
                            <?php endif?>
                            <?php if ($door->Installation_of_face_bolt >= 1):?>
                                <?php echo'Установка торцевого шпингалета:'.PHP_EOL.
                                    $door->Installation_of_face_bolt?>
                            <?php endif?>
                            <?php if ($door->Finnish_door_installation >= 1):?>
                                <?php echo'Установка финской двери:'.PHP_EOL.
                                    $door->Finnish_door_installation?>
                            <?php endif?>
                            <?php if ($door->Installation_of_the_arch >= 1):?>
                                <?php echo'Монтаж арки:'.PHP_EOL.
                                    $door->Installation_of_the_arch?>
                            <?php endif?>
                            <?php if ($door->Making_transom >= 1):?>
                                <?php echo'Изготовление фрамуги:'.PHP_EOL.
                                    $door->Making_transom?>
                            <?php endif?>
                            <?php if ($door->Tile_cutting_side >= 1):?>
                                <?php echo'Резка плитки сторона :'.PHP_EOL.
                                    $door->Tile_cutting_side?>
                            <?php endif?>
                            <?php if ($door->Installation_of_the_door_Barsik >= 1):?>
                                <?php echo'Монтаж дверцы "Барсик":'.PHP_EOL.
                                    $door->Installation_of_the_door_Barsik?>
                            <?php endif?>
                            <?php if ($door->Installation_of_capitals >= 1):?>
                                <?php echo'Установка капители:'.PHP_EOL.
                                    $door->Installation_of_capitals?>
                            <?php endif?>
                            <?php if ($door->Dismantling_skirting_board >= 1):?>
                                <?php echo'Демонтаж плинтуса:'.PHP_EOL.
                                    $door->Dismantling_skirting_board?>
                            <?php endif?>
                            <?php if ($door->Dismantling_the_main_walls >= 1):?>
                                <?php echo'Демонтаж капитальных стен:'.PHP_EOL.
                                    $door->Dismantling_the_main_walls?>
                            <?php endif?>
                            <?php if ($door->Installing_a_biometric_lock >= 1):?>
                                <?php echo'Установка биометрического замка:'.PHP_EOL.
                                    $door->Installing_a_biometric_lock?>
                            <?php endif?>
                            <?php if ($door->Installation_of_wooden_plastic_baseboards >= 1):?>
                                <?php echo'Установка деревянного,пластикового плинтуса:'.PHP_EOL.
                                    $door->Installation_of_wooden_plastic_baseboards?>
                            <?php endif?>
                            <?php if ($door->Foam_assembly >= 1):?>
                                <?php echo'Пена монтажная:'.PHP_EOL.
                                    $door->Foam_assembly?>
                            <?php endif?>
                            <?php if ($door->Masking_tape >= 1):?>
                                <?php echo'Скотч малярный:'.PHP_EOL.
                                    $door->Masking_tape?>
                            <?php endif?>
                            <?php if ($door->Fastener >= 1):?>
                                <?php echo'Крепеж:'.PHP_EOL.
                                    $door->Fastener?>
                            <?php endif?>
                            <?php if ($door->Metal_plates >= 1):?>
                                <?php echo'Металлические пластины:'.PHP_EOL.
                                    $door->Metal_plates?>
                            <?php endif?>
                            <?php if ($door->Garbage_bags >= 1):?>
                                <?php echo'Мешки для мусора:'.PHP_EOL.
                                    $door->Garbage_bags?>
                            <?php endif?>
                        </ul>
                    </div>
                    <div>
                        <strong>Габариты проёма, коробки, полотна (ВхШхГ): </strong>
                        <div>Проём : <?=$door->Opening_height?> x <?=$door->Opening_width?> x <?=$door->Opening_depth?> мм</div>
                        <div>Коробка: <?=$door->Box_height?>x <?=$door->Box_width?>x <?=$door->Box_depth?> мм</div>
                        <div>Полотно : <?=$door->Web_height?> x <?=$door->Web_width?> x <?=$door->Web_depth?> мм</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>