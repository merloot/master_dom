<?php

//\Yii::$app->response->format = 'json';
$this->title = 'Кол-во дверей';
?>
<div class="container">
    <div class="container-doors-counter">
        <div class="row">
            <div class="col-xs-12 col-sm-12 co1-md-12 col-lg-12">
                <div class="container-doors-counter__block">
                    <h3>Введите количество дверей:</h3>
                    <form method="post" action="<?=\yii\helpers\Url::to('create')?>">
                        <input name="count" id="count" class="form-control counter-doors" type="number">
                        <input type="submit" value="Отправить" class="btn btn-master" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>

    .container-doors-counter__block h3{
        text-align: center;
    }

    .container-doors-counter__block{
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }

    .container-doors-counter form{
        display: flex;
    }

    .counter-doors{
        max-width: 350px;
    }
</style>