<?php

namespace frontend\modules\doors\models;

use Yii;

/**
 * This is the model class for table "ServiceDoors".
 *
 * @property int $id_service
 * @property int $id_doors
 * @property int $count_service
 *
 * @property Doors $doors
 * @property ServicePrice $service
 */
class ServiceDoors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ServiceDoors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_service', 'id_doors'], 'required'],
            [['id_service', 'id_doors', 'count_service'], 'default', 'value' => null],
            [['id_service', 'id_doors', 'count_service'], 'integer'],
            [['id_service', 'id_doors'], 'unique', 'targetAttribute' => ['id_service', 'id_doors']],
            [['id_doors'], 'exist', 'skipOnError' => true, 'targetClass' => Doors::className(), 'targetAttribute' => ['id_doors' => 'id']],
            [['id_service'], 'exist', 'skipOnError' => true, 'targetClass' => ServicePrice::className(), 'targetAttribute' => ['id_service' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_service' => 'Id Service',
            'id_doors' => 'Id Doors',
            'count_service' => 'Count Service',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoors()
    {
        return $this->hasOne(Doors::className(), ['id' => 'id_doors']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(ServicePrice::className(), ['id' => 'id_service']);
    }
}
