<?php

namespace frontend\modules\doors\models;

use Yii;

/**
 * This is the model class for table "ServicePrice".
 *
 * @property int $id
 * @property string $name Название Услуги
 * @property int $type_service
 * @property string $price Цена услуги
 * @property int $percent_accruals Процент начисления зп сотрудникам
 * @property int $unit Тип единицы измерения
 *
 * @property ServiceDoors[] $serviceDoors
 * @property Doors[] $doors
 */
class ServicePrice extends \yii\db\ActiveRecord
{
    const TYPE_SERVICE_DEMONTAG = 0;
    const TYPE_SERVICE_PREPARATORY_WORK = 1;
    const TYPE_SERVICE_BOXED_PRODUCT = 2;
    const TYPE_SERVICE_OTHER = 3;

    const TYPE_UNIT_PIECE = 0;
    const TYPE_UNIT_SET = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ServicePrice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_service', 'percent_accruals', 'unit'], 'default', 'value' => null],
            [['type_service', 'percent_accruals', 'unit'], 'integer'],
            ['type_service', 'in', 'range'=>[
                self::TYPE_SERVICE_DEMONTAG,
                self::TYPE_SERVICE_PREPARATORY_WORK,
                self::TYPE_SERVICE_BOXED_PRODUCT,
                self::TYPE_SERVICE_OTHER
            ]],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'type_service' => 'Тип услуг',
            'price' => 'цена',
            'percent_accruals' => 'Процент начисления зп сотрудникам',
            'unit' => 'Единица измерения',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceDoors()
    {
        return $this->hasMany(ServiceDoors::className(), ['id_service' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoors()
    {
        return $this->hasMany(Doors::className(), ['id' => 'id_doors'])->viaTable('ServiceDoors', ['id_service' => 'id']);
    }
}
