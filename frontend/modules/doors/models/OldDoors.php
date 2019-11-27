<?php

namespace frontend\modules\doors\models;

use common\interfaces\OldDoorsInterface;
use yii\db\ActiveRecord;

class OldDoors extends ActiveRecord implements OldDoorsInterface {
    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'doors_measurements';
    }

    public static function getDb() {
        return \Yii::$app->get('old_db');
    }
}