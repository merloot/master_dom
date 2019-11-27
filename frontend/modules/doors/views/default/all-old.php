<?php

/* @var $this yii\web\View */
/* @var $doors frontend\modules\doors\models\Doors*/

use yii\widgets\LinkPager;


$this->title = 'Готовые старые замеры';

?>
<div class="site-index">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 co1-md-12 col-lg-12">
                <h3><?=$this->title?></h3>
            </div>
            <div class="col-xs-12 col-sm-12 co1-md-12 col-lg-12">
                <?php echo $this->render('_old_search', ['model' => $searchModel]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 co1-md-12 col-lg-12 ">
                <button onclick="window.location='<?=\yii\helpers\Url::toRoute('all')?>'" class="btn btn-master">Новые заказы</button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="doors-list">
            <div class="row">
                <?php foreach ($doors as $one):?>
                    <?php $date = strtotime($one->date)?>
                    <div class="col-xs-12 col-sm-6 co1-md-4 col-lg-4">
                        <div class="doors-list__item" onclick="location.href='default/one-old?id=<?=$one->id?>';">
                            <h4>№ Заказа: <strong><?= yii\bootstrap\Html::a($one->id,['one-old','id'=>$one->id])?></strong></h4>
                            <div>
                                <strong>Заказчик:</strong><?= !empty($one->client_name) ? $one->client_name: '' ?>
                            </div>
                            <div>
                                <strong>Дата создания: </strong><br>  <?= !empty($one->date) ? $one->date: '' ?>
                            </div>
                            <div>
                                <strong>Телефон:</strong><?= !empty($one->client_phone) ? $one->client_phone: '' ?>
                            </div>
                            <div>
                                <strong>Адрес: </strong><?= !empty($one->client_street) ? 'Улица:'.$one->client_street .PHP_EOL.'Дом:'.$one->client_house .PHP_EOL.'Квартира:'.$one->client_apartment: '' ?>
                            </div>
                            <div>
                                <strong>Комментарий: </strong><br>  <?= !empty($one->client_comment) ? $one->client_comment : '' ?>
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