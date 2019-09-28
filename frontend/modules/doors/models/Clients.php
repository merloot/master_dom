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
            [['telephone'], 'integer'],
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
            'FIO' => 'Fio',
            'street' => 'Street',
            'house' => 'House',
            'porch' => 'Porch',
            'apartment' => 'Apartment',
            'telephone' => 'Telephone',
            'comment' => 'Comment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientsDoors()
    {
        return $this->hasOne(ClientsDoors::className(), ['id_client' => 'id']);
    }
}
