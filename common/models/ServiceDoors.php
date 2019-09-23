<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ServiceDoors".
 *
 * @property int $id_service
 * @property int $id_doors
 * @property int $count_service
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
}
