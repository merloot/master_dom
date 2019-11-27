<?php

namespace frontend\modules\doors\models;

use Yii;

/**
 * This is the model class for table "ImagesFinishedDoors".
 *
 * @property int $id_finished_doors
 * @property int $id_image
 *
 * @property FinishedDoors $finishedDoors
 * @property Images $image
 */
class ImagesFinishedDoors extends \yii\db\ActiveRecord {
    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'ImagesFinishedDoors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id_finished_doors', 'id_image'], 'required'],
            [['id_finished_doors', 'id_image'], 'default', 'value' => null],
            [['id_finished_doors', 'id_image'], 'integer'],
            [['id_finished_doors', 'id_image'], 'unique', 'targetAttribute' => ['id_finished_doors', 'id_image']],
            [['id_finished_doors'], 'exist', 'skipOnError' => true, 'targetClass' => FinishedDoors::className(), 'targetAttribute' => ['id_finished_doors' => 'id']],
            [['id_image'], 'exist', 'skipOnError' => true, 'targetClass' => Images::className(), 'targetAttribute' => ['id_image' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id_finished_doors' => 'Id Finished Doors',
            'id_image' => 'Id Image',
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
    public function getImage() {
        return $this->hasOne(Images::className(), ['id' => 'id_image']);
    }
}
