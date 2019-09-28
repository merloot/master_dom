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
 */
class ServicePrice extends \yii\db\ActiveRecord
{
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
            'name' => 'Name',
            'type_service' => 'Type Service',
            'price' => 'Price',
            'percent_accruals' => 'Percent Accruals',
            'unit' => 'Unit',
        ];
    }
}
