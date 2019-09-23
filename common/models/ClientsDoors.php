<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ClientsDoors".
 *
 * @property int $id_clients_doors
 * @property int $id_client
 * @property int $id_doors
 *
 * @property Clients $client
 */
class ClientsDoors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ClientsDoors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_client', 'id_doors'], 'default', 'value' => null],
            [['id_client', 'id_doors'], 'integer'],
            [['id_client'], 'unique'],
            [['id_doors'], 'unique'],
            [['id_client'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['id_client' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_clients_doors' => 'Id Clients Doors',
            'id_client' => 'Id Client',
            'id_doors' => 'Id Doors',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::className(), ['id' => 'id_client']);
    }
}
