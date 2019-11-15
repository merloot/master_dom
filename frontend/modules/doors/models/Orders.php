<?php

namespace frontend\modules\doors\models;

use common\models\User;
use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "Orders".
 *
 * @property int $id_order
 * @property int $id_doors
 * @property int $id_client
 * @property int $date_create
 *
 * @property Doors $doors
 * @property Clients $client
 */
class Orders extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['id_order','id_doors','id_client'],'required'],
            [['id_order','id_doors','id_client'],'integer'],
            [['date_create'], 'default', 'value' => date('Y-m-d')],
            [['id_order', 'id_doors'], 'unique', 'targetAttribute' => ['id_order', 'id_doors']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_order' => 'Номер заказа',
            'id_doors' => 'Номер двери',
            'id_client' => 'Номер клиента',
        ];
    }

    public function getDoors(){
        return $this->hasMany(Doors::className(), ['id' => 'id_doors']);

    }

    public function getClient(){
        return $this->hasOne(Clients::className(), ['id' => 'id_client']);
    }

    public function getServices() {
        return $this->hasMany(ServiceDoors::className(), [
            'id_doors' => 'id_doors'
        ]);
    }

    public function getAuthor() {
        return $this->hasOne(User::className(), [
            'id' => 'user_id'
        ])->viaTable('Doors', [
            'id' => 'id_doors'
        ]);
    }
}
