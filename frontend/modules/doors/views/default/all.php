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
                    <?php $date = strtotime($one->date_create)?>
                    <div class="col-xs-12 col-sm-6 co1-md-4 col-lg-4">
                        <div class="doors-list__item">
                            <h4>№ Заказа: <strong><?= yii\bootstrap\Html::a($one->id,['one','id'=>$one->id])?></strong></h4>
                            <div>
                                <strong>Заказчик:</strong><?=$one->client->FIO?>
                            </div>
                            <div>
                                <strong>Телефон:</strong><?=$one->client->telephone?>
                            </div>
                            <div>
                                <strong>Адрес: </strong><?=$one->client->address?>
                            </div>
                            <div>
                                <strong>Комментарий: </strong><?=$one->client->comment?>
                            </div>
                            <div>
                                <strong>Дата замеров: </strong><?= date('Y-m-d',$date)?>
                            </div>
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