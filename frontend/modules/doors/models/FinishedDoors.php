<?php

namespace frontend\modules\doors\models;

use common\interfaces\DoorsInterface;
use Yii;
use yii\helpers\Json;

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

    public $sizeDoors;

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            ['sizeDoors','safe'],
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

    public function beforeDelete() {
        if (parent::beforeDelete()){
            SizeDoors::deleteAll(['id_finished_doors'=>$this->id]);
            return true;
        }else{
            return false;
        }
    }

    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);
        $array = $this->sizeDoors;
//        var_dump($array);
//        die();
        if (is_array($array)) {
            foreach ($array as $value) {
                $this->createSizeDoors(Json::decode($value));
            }
        } if (empty($array)) {
            return false;
        }
    }


    public function createSizeDoors($value) {
        $size = Size::find()->where(['size'=>$value])->one();
        if ($size) {
           $sizeDoor = new SizeDoors();
           $sizeDoor->id_size = $size->id;
           $sizeDoor->id_finished_doors = $this->id;
           $sizeDoor->save();
        } else {
            $size = new Size();
            $size->size = $value;
            $size->save();
            $sizeDoor = new SizeDoors();
            $sizeDoor->id_size = $size->id;
            $sizeDoor->id_finished_doors = $this->id;
            $sizeDoor->save();
        }
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
