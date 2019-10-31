<?php

namespace common\interfaces;
/**
 * Created by PhpStorm.
 * User: user14
 * Date: 29.09.19
 * Time: 12:37
 */
interface OldDoorsInterface {

    const TYPE_DOORS_INTERIOR = 'interroom';
    const TYPE_DOORS_IRON = 'metal';

    const ADHERENCE_INTERIOR_LEFT = 0;
    const ADHERENCE_INTERIOR_RIGHT = 1;
    const ADHERENCE_OUTDOOR_LEFT = 2;
    const ADHERENCE_OUTDOOR_RIGHT = 3;

    const TYPE_OPENING_MID = 0;
    const TYPE_OPENING_LEFT = 1;
    const TYPE_OPENING_RIGHT = 2;
}