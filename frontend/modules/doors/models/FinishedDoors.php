<?php

namespace frontend\modules\doors\models;

use common\interfaces\DoorsInterface;
use Yii;

/**
 * This is the model class for table "FinishedDoors".
 *
 * @property int $id
 * @property int $type_doors
 * @property string $name
 * @property int $price
 *
 * @property ImagesFinishedDoors[] $imagesFinishedDoors
 * @property Images[] $images
 * @property Orders[] $orders
 * @property SizeDoors[] $sizeDoors
 * @property Size[] $sizes
 */
class FinishedDoors extends \yii\db\ActiveRecord implements DoorsInterface {
    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'FinishedDoors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['type_doors', 'price'], 'default', 'value' => null],
            [['type_doors', 'price'], 'integer'],
            ['type_doors', 'in', 'range' => [self::TYPE_DOORS_INTERIOR, self::TYPE_DOORS_IRON]],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'type_doors' => 'Type Doors',
            'name' => 'Name',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImagesFinishedDoors() {
        return $this->hasMany(ImagesFinishedDoors::className(), ['id_finished_doors' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages() {
        return $this->hasMany(Images::className(), ['id' => 'id_image'])->viaTable('ImagesFinishedDoors', ['id_finished_doors' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders() {
        return $this->hasMany(Orders::className(), ['id_finished_doors' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSizeDoors() {
        return $this->hasMany(SizeDoors::className(), ['id_finished_doors' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSizes() {
        return $this->hasMany(Size::className(), ['id' => 'id_size'])->viaTable('SizeDoors', ['id_finished_doors' => 'id']);
    }
}
