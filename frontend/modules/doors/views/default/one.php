<?php
use yii\bootstrap\Html;
?>
<div class="row">
    <div class="col-lg-6">
        <div>
            <!--                        СДЕЛАЙ Визуал я потом сюда подставлю данные -->

            <!--            БЛОК С ИНФОРМАЦИЕЙ О КЛИЕНТЕ -->
<!--            <p>--><?//=$door->clientsDoors->address?><!--</p>-->
<!--            <p>--><?//=$door->clientsDoors->FIO?><!--</p>-->
<!--            <p>--><?//=$door->clientsDoors->telephone?><!--</p>-->
<!--            <p>--><?//=$door->clientsDoors->comment?><!--</p>-->
        </div>
        <div>
<!--            БЛОК С ИНФОРМАЦИЕЙ О ДВЕРЬ-->
            <p>Тип устанавливаемой двери :<?=$door->type_doors?></p>
            <p>Комментарий <?=$door->comment?></p>
            <p>Материал стен:<?=$door->wall_material?></p>
            <p>Вид проема в плане:<?=$door->adherence?></p>
            <p>Вид проема в плане:<?=$door->type_opening?></p>
            <h2>Габариты,проема,коробки,полотна</h2>
            <p><?=$door->height_box?></p>
            <p><?=$door->depth_box?></p>
            <p><?=$door->width_box?></p>
            <p><?=$door->height_aperture?></p>
            <p><?=$door->depth_aperture?></p>
            <p><?=$door->width_aperture?></p>
            <p><?=$door->height_canvas?></p>
            <p><?=$door->depth_canvas?></p>
            <p><?=$door->width_canvas?></p>
        </div>
    </div>
<!--    БЛОК ИНФОРМАЦИИ С УСЛУГАМИ-->
    <div class="about col-lg-3">
    </div>
</div>

<style>
    .row{
        display: flex;
        justify-content: space-between;
    }
    .about{
        margin-top: 64px;
    }
</style>