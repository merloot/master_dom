<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Специализация';
?>
<div class="site-index">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Выберите специализацию:</h1>
                <div class="specialization-block">
                    <div class="specialization-block__item">
                        <a href="<?=Url::to('doors/create')?>">
                            <?=Html::img('/image/doors_icon.svg')?>
                            <h2>Новый замер [Двери]</h2>
                        </a>
                    </div>
                    <div class="specialization-block__item">
                        <a href="<?=Url::to('doors/all')?>">
                            <?=Html::img('/image/finished_doors_icon.svg')?>
                            <h2>Готовые замеры [Двери]</h2>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
