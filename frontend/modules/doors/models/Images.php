<?php

namespace frontend\modules\doors\models;

use Yii;

/**
 * This is the model class for table "Images".
 *
 * @property int $id
 * @property string $image
 *
 * @property ImagesFinishedDoors[] $imagesFinishedDoors
 * @property FinishedDoors[] $finishedDoors
 */
class Images extends \yii\db\ActiveRecord {
    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'Images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'image' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImagesFinishedDoors() {
        return $this->hasMany(ImagesFinishedDoors::className(), ['id_image' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFinishedDoors() {
        return $this->hasMany(FinishedDoors::className(), ['id' => 'id_finished_doors'])->viaTable('ImagesFinishedDoors', ['id_image' => 'id']);
    }
}
