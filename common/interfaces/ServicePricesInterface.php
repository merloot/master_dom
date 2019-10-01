<?php

namespace common\interfaces;
/**
 * Created by PhpStorm.
 * User: user14
 * Date: 29.09.19
 * Time: 12:37
 */
interface ServicePricesInterface {

    const TYPE_SERVICE_DEMONTAG = 0;
    const TYPE_SERVICE_PREPARATORY_WORK = 1;
    const TYPE_SERVICE_BOXED_PRODUCT = 2;
    const TYPE_SERVICE_OTHER = 3;

    const TYPE_UNIT_PIECE = 0;
    const TYPE_UNIT_SET = 1;
}