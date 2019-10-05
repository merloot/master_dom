<?php
use yii\bootstrap\Html;
$this->title = 'Заказ № ';
?>
<div class="ticket-info">
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-12 co1-md-12 col-lg-12">
                <div class="ticket-info__button">
                    <button class="btn btn-master">Редактировать</button>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 co1-md-6 col-lg-6">
                <div class="ticket-info__personal">
                    <h3>Общая информация о заказчике</h3>
                    <div>
                        <strong>Заказ №: </strong><span>12345</span>
                    </div>
                    <div>
                        <strong>Cотрудник: </strong>Загребин Герман Сергеевич
                    </div>
                    <div>
                        <strong>Дата оформления:</strong>05.10.2019
                    </div>
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
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 co1-md-6 col-lg-6">
                <div class="ticket-info__personal">
                    <h3>Информация о дверях</h3>
                    <div>
                        <strong>Тип устанавливаемой двери: </strong> металлическая
                    </div>
                    <div>
                        <strong>Комментарий: </strong> АААААА КОММЕНТАРИЙ У НИХ ТАМ ПРОЕМЫ КОСЫЕ ШО ДЕЛАТЬ БУДЕМ НЕ ЗНАЮ
                    </div>
                    <div>
                        <strong>Материал стен: </strong>ж/бетон
                    </div>
                    <!--НУЖНО ВСТАВЛЯТЬ ВМЕСТО КЛАССА storonnst - УНИКАЛЬНЫЙ ПАРАМЕТР, ПО КОТОРОМУ Я БУДУ ОПРЕДЕЛЯТЬ, КАКАЯ СТОРОННОСТЬ  -->
                    <div class="storonnost">
                        <strong>Сторонность: </strong>
                        Левая наружняя
                        <?= \yii\helpers\Html::img('/image/left_doors.svg')?>
                    </div>
                    <div>
                        <strong>Вид проема: </strong>
                        <!--НУЖНО ВСТАВЛЯТЬ КАРТИНКУ В ЗАВИСИМОСТИ ОТ ВЫБРАННОГО ПРОЕМА  -->
                        #1
                        <?= \yii\helpers\Html::img('/image/mid_doors.svg')?>
                    </div>
                    <div>
                        <strong>Доп услуги: </strong>
                        <ul>
                            <!--ТУТ МОЖНО ОПУСТИТЬ КАКИЕ-ТО ПОЛЯ, ШТ, ЦЕНУ ИЛИ СУММУ-->
                            <li>Что-то там этакое (2 шт Х 150р) [300]</li>
                        </ul>
                    </div>
                    <div>
                        <strong>Расходные материалы: </strong>
                        <ul>
                            <!--ТУТ МОЖНО ОПУСТИТЬ КАКИЕ-ТО ПОЛЯ, ШТ, ЦЕНУ ИЛИ СУММУ-->
                            <li>Что-то там этакое (2 шт Х 150р) [300]</li>
                        </ul>
                    </div>
                    <div>
                        <strong>Коробочный продукт: </strong>
                        <ul>
                            <!--ТУТ МОЖНО ОПУСТИТЬ КАКИЕ-ТО ПОЛЯ, ШТ, ЦЕНУ ИЛИ СУММУ-->
                            <li>Что-то там этакое (2 шт Х 150р) [300]</li>
                        </ul>
                    </div>
                    <div>
                        <strong>Габариты проёма, коробки, полотна (ВхШхГ): </strong>
                        <div>Проём : 400 x 500 x 150 мм</div>
                        <div>Коробка: 400 x 500 x 150 мм</div>
                        <div>Полотно : 400 x 500 x 150 мм</div>
                    </div>
                </div>
            </div>
    </div>
    </div>
</div>