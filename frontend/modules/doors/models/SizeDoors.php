<?php

namespace frontend\modules\doors\models;

use Yii;

/**
 * This is the model class for table "SizeDoors".
 *
 * @property int $id_finished_doors
 * @property int $id_size
 *
 * @property FinishedDoors $finishedDoors
 * @property Size $size
 */
class SizeDoors extends \yii\db\ActiveRecord {
    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'SizeDoors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
//            [['id_finished_doors', 'id_size'], 'required'],
            [['id_finished_doors', 'id_size'], 'default', 'value' => null],
            [['id_finished_doors', 'id_size'], 'integer'],
            [['id_finished_doors', 'id_size'], 'unique', 'targetAttribute' => ['id_finished_doors', 'id_size']],
            [['id_finished_doors'], 'exist', 'skipOnError' => true, 'targetClass' => FinishedDoors::className(), 'targetAttribute' => ['id_finished_doors' => 'id']],
            [['id_size'], 'exist', 'skipOnError' => true, 'targetClass' => Size::className(), 'targetAttribute' => ['id_size' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id_finished_doors' => 'Id Finished Doors',
            'id_size' => 'Id Size',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFinishedDoors() {
        return $this->hasOne(FinishedDoors::className(), ['id' => 'id_finished_doors']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSize() {
        return $this->hasOne(Size::className(), ['id' => 'id_size']);
    }
}
