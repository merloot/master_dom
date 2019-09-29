<?php

namespace frontend\modules\doors\models;

use Yii;

/**
 * This is the model class for table "Clients".
 *
 * @property int $id
 * @property string $FIO Фамилия Имя Отчество
 * @property string $street Улица
 * @property string $house Дом
 * @property string $porch Подъезд
 * @property string $apartment Квартира
 * @property int $telephone Номер телефона
 * @property string $comment Комментарий к заказу
 *
 * @property ClientsDoors $clientsDoors
 */
class Clients extends \yii\db\ActiveRecord
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
            [['telephone'], 'integer','max'=>12],
            [['comment'], 'string'],
            [['FIO', 'street', 'house', 'porch', 'apartment'], 'string', 'max' => 255],
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
            'street' => 'Улица',
            'house' => 'Дом',
            'porch' => 'Подъезд',
            'apartment' => 'Квартира',
            'telephone' => 'Телефон',
            'comment' => 'Комментарий ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientsDoors() {
        return $this->hasOne(ClientsDoors::className(), ['id_client' => 'id']);
    }
}
