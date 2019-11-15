<?php

/* @var $this yii\web\View */
/* @var $orders frontend\modules\doors\models\Orders*/
/* @var $searchOrder frontend\modules\doors\models\OrdersSearch*/
use yii\bootstrap\Html;
use yii\widgets\LinkPager;


$this->title = 'Готовые замеры';

?>
<div class="site-index">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 co1-md-12 col-lg-12">
                <h3><?=$this->title?></h3>
            </div>
            <div class="col-xs-12 col-sm-12 co1-md-12 col-lg-12">
                <?php echo $this->render('_search', ['model' => $searchOrder])?>
            </div>
            <div class="col-xs-12 col-sm-12 co1-md-12 col-lg-12 ">
                <button onclick="window.location='<?=\yii\helpers\Url::toRoute('all-old')?>'" class="btn btn-master">Старые заказы</button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="doors-list">
            <div class="row">
                <?php foreach ($orders as $one):?>
<!--                    --><?php //$date = strtotime()?>
                    <div class="col-xs-12 col-sm-6 co1-md-4 col-lg-4">
                        <div class="doors-list__item" onclick="location.href='default/order?id=<?=$one->id_order?>';">
                            <h4>№ Заказа: <strong><?= yii\bootstrap\Html::a($one->id_order,['order','id'=>$one->id_order])?></strong></h4>
                            <div>
                                <strong>Заказчик:</strong><?= !empty($one->client->FIO) ? $one->client->FIO : '' ?>
                            </div>
                            <div>
                                <strong>Телефон:</strong><?= !empty($one->client->telephone) ? $one->client->telephone: '' ?>
                            </div>
                            <div>
                                <strong>Адрес: </strong><?= !empty($one->client->address) ? $one->client->address : '' ?>
                            </div>
                            <div>
                                <strong>Комментарий: </strong><br>  <?= !empty($one->client->comment) ? $one->client->comment : '' ?>
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
</div>