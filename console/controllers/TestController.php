<?php

namespace console\controllers;

use frontend\modules\doors\models\Clients;
use frontend\modules\doors\models\Doors;
use frontend\modules\doors\models\Parser;
use frontend\modules\doors\models\ServiceDoors;
use frontend\modules\doors\models\ServicePrice;
use Yii;
use yii\console\Controller;
use yii\helpers\Html;
use yii\helpers\Json;

class TestController extends Controller {

    public function actionIndex(){

        var_dump(ini_get('short_open_tag'));
        die();
        if (ini_get('short_open_tag') == 0 && strtoupper(ini_get('short_open_tag')) != 'ON')
            die('Error: short_open_tag parameter must be turned on in php.ini');
//        $test = Parser::getPage([
//            'url'=> 'https://www.stroysa.tomsk.ru/catalog/dveri_mezhkomnatnye/?PAGEN_2=2',
//            "timeout" => 10,
//        ]);
//        var_dump($test);

    }
}