<?php

/* @var $this yii\web\View */
/* @var $doors frontend\modules\doors\models\Doors*/
use yii\bootstrap\Html;
use yii\widgets\LinkPager;
?>
<div class="site-index">
    <?php echo $this->render('_search', ['model' => $searchModel]) ?>

    <div class="jumbotron">
        <h1>Готовые заказы</h1>
    </div>

    <div class="body-content container">
        <div class="row">

            <?php foreach ($doors as $one):?>
                <div class="post col-lg-4 mb-5">
                    <div class="post-about">
<!--                        СДЕЛАЙ Визуал я потом сюда подставлю данные -->
                        <h3><?= yii\bootstrap\Html::a($one->id,['one','id'=>$one->id])?></h3>
<!--                        <p>адрес--><?//=$one->test->address?><!--</p>-->
<!--                        <p>ФИО--><?//=$one->clientsDoors->FIO?><!--</p>-->
<!--                        <p>телефон--><?//=$one->clientsDoors->telephone?><!--</p>-->
<!--                        <p>комментарий--><?//=$one->clientsDoors->comment?><!--</p>-->
                        <p>Логин <?=$one->author->id?></p>
                        <p>Дата замеров: <?=$one->date_create?></p>
                    </div>
                </div>
            <?php endforeach?>

        </div>
        <div>
            <?= LinkPager::widget([
                'pagination' => $pages,
            ]); ?>
        </div>
    </div>

    <style>
        .show{
            display: block;
        }
        .hide{
            display: none;
        }
        .post{
            height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }
        .post-about{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .div-img img{
            max-height: 150px;
            max-width: 200px;
        }
        h1{
            margin-top: -50px;
            margin-bottom: -40px;
        }
    </style>