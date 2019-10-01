<?php

namespace frontend\modules\doors\models;

use common\interfaces\ClientsInterface;
use Yii;

/**
 * This is the model class for table "Clients".
 *
 * @property int $id
 * @property string $FIO Фамилия Имя Отчество
 * @property string $street Улица
 * @property string $house Дом
 * @property string $comment Комментарий к заказу
 *
 * @property ClientsDoors $clientsDoors
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
            [['telephone'], 'default', 'value' => null],
            [['telephone','type_elevator'], 'integer','max'=>12],
            [['comment'], 'string'],
            [['type_elevator'],'in','range'=>[self::TYPE_ELEVATOR_FALSE, self::TYPE_ELEVATOR_PASSENGER, self::TYPE_ELEVATOR_GOODS]],
            [['FIO', 'address'], 'string', 'max' => 255],
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
            'address' => 'Улица',
            'telephone' => 'Телефон',
            'comment' => 'Комментарий ',
            'type_elevator' => 'Тип Лифта',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientsDoors() {
        return $this->hasOne(ClientsDoors::className(), ['id_client' => 'id']);
    }
}
