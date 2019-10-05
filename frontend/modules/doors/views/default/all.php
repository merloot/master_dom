<?php

/* @var $this yii\web\View */
/* @var $doors frontend\modules\doors\models\Doors*/
use yii\bootstrap\Html;
use yii\widgets\LinkPager;


$this->title = 'Готовые замеры';
?>
<div class="site-index">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 co1-md-12 col-lg-12">
                <h3>Готовые замеры</h3>
            </div>
            <div class="col-xs-12 col-sm-12 co1-md-12 col-lg-12">
                <?php echo $this->render('_search', ['model' => $searchModel]) ?>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="doors-list">
            <div class="row">
                <?php foreach ($doors as $one):?>
                    <div class="col-xs-12 col-sm-6 co1-md-4 col-lg-4">
                        <div class="doors-list__item">
                            <h4>№ Заказа: <strong><?= yii\bootstrap\Html::a($one->id,['one','id'=>$one->id])?></strong></h4>
                            <div>
                                <strong>Заказчик:</strong>Архипов Максим Сергеевич
                            </div>
                            <div>
                                <strong>Телефон:</strong>89529095459
                            </div>
                            <div>
                                <strong>Адрес: </strong>г. Томск ул. Пушкина дом Колотушкина подьезд 35
                            </div>
                            <div>
                                <strong>Комментарий: </strong>Йобаный рот этого казино блять Йобаный рот этого казино блять Йобаный рот этого казино блять Йобаный рот этого казино блять Йобаный рот этого казино блять
                            </div>


                            <!--                        СДЕЛАЙ Визуал я потом сюда подставлю данные -->
<!--                            <h3>--><?//= yii\bootstrap\Html::a($one->id,['one','id'=>$one->id])?><!--</h3>-->
                            <!--                        <p>адрес--><?//=$one->test->address?><!--</p>-->
                            <!--                        <p>ФИО--><?//=$one->clientsDoors->FIO?><!--</p>-->
                            <!--                        <p>телефон--><?//=$one->clientsDoors->telephone?><!--</p>-->
                            <!--                        <p>комментарий--><?//=$one->clientsDoors->comment?><!--</p>-->
<!--                            <p>Логин --><?//=$one->author->id?><!--</p>-->
<!--                            <p>Дата замеров: --><?//=$one->date_create?><!--</p>-->
                        </div>
                    </div>
                <?php endforeach?>
            </div>
        </div>
        <div>
            <?= LinkPager::widget([
                'pagination' => $pages,
            ]); ?>
        </div>
    </div>