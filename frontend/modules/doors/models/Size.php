<?php

namespace frontend\modules\doors\models;

use Yii;

/**
 * This is the model class for table "Size".
 *
 * @property int $id
 * @property int $size
 *
 * @property SizeDoors[] $sizeDoors
 * @property FinishedDoors[] $finishedDoors
 */
class Size extends \yii\db\ActiveRecord {
    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'Size';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['size'], 'default', 'value' => null],
            [['size'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'size' => 'Size',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSizeDoors() {
        return $this->hasMany(SizeDoors::className(), ['id_size' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFinishedDoors() {
        return $this->hasMany(FinishedDoors::className(), ['id' => 'id_finished_doors'])->viaTable('SizeDoors', ['id_size' => 'id']);
    }
}
