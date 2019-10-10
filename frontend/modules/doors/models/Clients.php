<?php

namespace frontend\modules\doors\models;

use common\interfaces\ClientsInterface;

/**
 * This is the model class for table "Clients".
 *
 * @property int $id
 * @property string $FIO Фамилия Имя Отчество
 * @property string $address
 * @property string $comment Комментарий к заказу
 *
 */
class Clients extends \yii\db\ActiveRecord implements ClientsInterface
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['FIO','required'],
            [['type_elevator'], 'integer'],
            [['comment'], 'string'],
            [['type_elevator'],'in','range'=>[self::TYPE_ELEVATOR_FALSE, self::TYPE_ELEVATOR_PASSENGER, self::TYPE_ELEVATOR_GOODS]],
            [['FIO', 'address','telephone'], 'string', 'max' => 255],
            [['FIO','address', 'telephone','comment'], 'filter','filter'=>'\yii\helpers\HtmlPurifier::process'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'FIO' => 'ФИО',
            'address' => 'Адрес',
            'telephone' => 'Телефон',
            'comment' => 'Комментарий ',
            'type_elevator' => 'Тип Лифта',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoors() {
        return $this->hasMany(Doors::className(),[
            'client_id'=>'id'
        ]);
    }
}
