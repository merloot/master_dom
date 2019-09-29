<?php

namespace frontend\modules\doors\models;

use Yii;

/**
 * This is the model class for table "ClientsDoors".
 *
 * @property int $id_client
 * @property int $id_doors
 *
 * @property Clients $client
 * @property Doors $doors
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
            [['id_client', 'id_doors'], 'required'],
            [['id_client', 'id_doors'], 'default', 'value' => null],
            [['id_client', 'id_doors'], 'integer'],
            [['id_client', 'id_doors'], 'unique', 'targetAttribute' => ['id_client', 'id_doors']],
            [['id_client'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['id_client' => 'id']],
            [['id_doors'], 'exist', 'skipOnError' => true, 'targetClass' => Doors::className(), 'targetAttribute' => ['id_doors' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoors()
    {
        return $this->hasOne(Doors::className(), ['id' => 'id_doors']);
    }
}
