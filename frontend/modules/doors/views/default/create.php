<?php

use yii\helpers\Html;
use frontend\modules\doors\models\Doors;
use frontend\modules\doors\models\Clients;
use frontend\modules\doors\models\ServicePrice;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $client frontend\modules\doors\models\Clients*/
/* @var $doors frontend\modules\doors\models\Doors */
/* @var $service frontend\modules\doors\models\ServicePrice*/
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Установка дверей';
?>

<div class="service-price-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <div class="row">
            <!--Клиенты-->
            <div class="col-xs-12 col-sm-12 co12-md-12 col-lg-12">
                <h3>Общая информация о заказчике: </h3>
                <?= $form->field($client, 'address')->textInput() ?>
            </div>
            <div class="col-xs-12 col-sm-12 co12-md-6 col-lg-6">
                <?= $form->field($client, 'FIO')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 co12-md-6 col-lg-6">
                <?= $form->field($client, 'telephone')->textInput(['maxlength'=>11]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 co12-md-12 col-lg-12">
                <?=$form->field($client,'type_elevator')->dropDownList([
                          Clients::TYPE_ELEVATOR_PASSENGER    =>  'Пассажирский',
                          Clients::TYPE_ELEVATOR_GOODS        =>  'Грузовой',
                          Clients::TYPE_ELEVATOR_FALSE        =>  'Лифт отсутствует',
                ])?>
            </div>
            <div class="col-xs-12 col-sm-12 co12-md-12 col-lg-12">
                <?= $form->field($client, 'comment')->textarea() ?>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-12 co12-md-12 col-lg-12">
                <div class="door-header">
                    <h1>Двери:</h1>
                    <button class="btn btn-master">Добавить дверь</button>
                </div>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    Дверь 1
                                </a>
                                <a>X</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <?= $form->field($doors, 'type_doors')->dropDownList([
                                    Doors::TYPE_DOORS_IRON =>'Металическая',
                                    Doors::TYPE_DOORS_INTERIOR =>'Межкомнатная'
                                ]) ?>

                                <?= $form->field($doors, 'comment')->textarea() ?>

                                <hr>

                                <div>
                                    <label>Материал стен:</label>
                                    <?= $form->field($doors, 'wall_material')->radioList([
                                        'Сибит'     =>   'Сибит',
                                        'Кирпич'    =>   'Кирпич',
                                        'Ж/Бетон'   =>   'Ж/Бетон',
                                        'Дерево'    =>   'Дерево',
                                        'Другое'    =>   Html::textInput( 'wall_material',Yii::$app->request->post('wall_material'),['class' => 'form-control', 'placeholder' => 'Свой вариант']),
                                    ], ['encode' => false])->label(false)
                                    ?>
                                </div>

                                <hr>

                                <div>
                                    <label>Вид проема в плане:</label>
                                    <?=$form->field($doors, 'type_opening')->radioList([
                                        Doors::TYPE_OPENING_MID   => Html::img('/image/mid_doors.svg', ['width' => '100%', 'height' => 150]) ,
                                        Doors::TYPE_OPENING_LEFT  => Html::img('/image/left_doors_1.svg',['width' => '100%', 'height' => 150]) ,
                                        Doors::TYPE_OPENING_RIGHT => Html::img('/image/right_doors.svg' ,['width' => '100%', 'height' => 150])
                                    ], ['encode' => false])->label(false)
                                    ?>
                                </div>

                                <hr>

                                <div>
                                    <label>Сторонность:</label>
                                    <?=$form->field($doors, 'adherence')->radioList([
                                        Doors::ADHERENCE_INTERIOR_LEFT      => Html::img('/image/right_doors_1.svg', ['width' => '100%', 'height' => 150]),
                                        Doors::ADHERENCE_INTERIOR_RIGHT     => Html::img('/image/left_doors.svg',['width' => '100%', 'height' => 150]),
                                        Doors::ADHERENCE_OUTDOOR_LEFT       => Html::img('/image/right_doors_1.svg', ['width' => '100%', 'height' => 150]),
                                        Doors::ADHERENCE_OUTDOOR_RIGHT      => Html::img('/image/left_doors.svg',['width' => '100%', 'height' => 150]),
                                    ], ['encode' => false])->label(false)
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!--Двери-->
    <div>
        <h3>Размеры дверей: </h3>
        <?= $form->field($doors, 'type_doors')->radioList([
            Doors::TYPE_DOORS_IRON =>'Металическая',
            Doors::TYPE_DOORS_INTERIOR =>'Межкомнатная'
        ]) ?>

        <div>
            <label>Вид проема в плане:</label>
            <?=$form->field($doors, 'type_opening')->radioList([
                Doors::TYPE_OPENING_MID   => Html::img('/image/mid_doors.svg', ['width' => 250, 'height' => 150]) ,
                Doors::TYPE_OPENING_LEFT  => Html::img('/image/left_doors_1.svg',['width' => 250, 'height' => 150]) ,
                Doors::TYPE_OPENING_RIGHT => Html::img('/image/right_doors.svg' ,['width' => 250, 'height' => 150])
            ], ['encode' => false])->label(false)
            ?>
        </div>

        <br>
        <div>
            <label>Сторонность:</label>
            <?=$form->field($doors, 'adherence')->radioList([
                Doors::ADHERENCE_INTERIOR_LEFT      => Html::img('/image/right_doors_1.svg', ['width' => 250, 'height' => 150]),
                Doors::ADHERENCE_INTERIOR_RIGHT     => Html::img('/image/left_doors.svg',['width' => 250, 'height' => 150]),
                Doors::ADHERENCE_OUTDOOR_LEFT       => Html::img('/image/right_doors_1.svg', ['width' => 250, 'height' => 150]),
                Doors::ADHERENCE_OUTDOOR_RIGHT      => Html::img('/image/left_doors.svg',['width' => 250, 'height' => 150]),
            ], ['encode' => false])->label(false)
            ?>
        </div>

        <?= $form->field($doors, 'comment')->textInput() ?>

        <?= $form->field($doors, 'wall_material')->radioList([
            'Сибит'     =>   'Сибит',
            'Кирпич'    =>   'Кирпич',
            'Ж/Бетон'   =>   'Ж/Бетон',
            'Дерево'    =>   'Дерево',
            'Другое'    =>   Html::textInput('wall_material'),
        ], ['encode' => false])->label(false)
        ?>

    </div>

    <!--Сервисы-->
     <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr class="active">
                        <th>Наименование</th>
                        <th>Кол-во</th>
                        <th>Цена</th>
                        <th>Сумма</th>
                        <th><i aria-hidden="true">&times;</i></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($service as $item): ?>
                        <tr>
                            <td><a><?= $item['name']?></a></td>
                            <td><?=$item['price']?></td>
                            <td><a href="<?=\yii\helpers\Url::to(['cart/remove', 'id' => $item->id])?>">Удалить</a></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr class="active">
                        <td colspan="4">Общее кол-во:</td>
                    </tr>
                    <tr class="active">
                        <td colspan="4">Общая сумма:</td>
                    </tr>
                    </tbody>
                </table>
            </div>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-master']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
