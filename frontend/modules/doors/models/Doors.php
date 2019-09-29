<?php

namespace frontend\modules\doors\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Doors".
 *
 * @property int $id
 * @property int $type_doors
 * @property string $comment
 * @property string $wall_material
 * @property bool $adherence Сторонность
 * @property int $type_opening Вид проема в плане
 * @property string $sum
 *
 * @property ClientsDoors[] $clientsDoors
 * @property ServiceDoors[] $serviceDoors
 * @property ServicePrice[] $services
 */
class Doors extends \yii\db\ActiveRecord implements \DoorsInterface
{

    public $service;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Doors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_doors', 'type_opening'], 'default', 'value' => null],
            [['type_doors', 'type_opening'], 'integer'],
            ['type_doors', 'in', 'range'=>[self::TYPE_DOORS_INTERIOR,self::TYPE_DOORS_IRON]],



            [['adherence'], 'boolean'],
            ['adherence', 'in', 'range'=>[self::ADHERENCE_LEFT,self::ADHERENCE_RIGHT]],

            ['type_opening','in','range'=>[self::TYPE_OPENING_MID,self::TYPE_OPENING_LEFT,self::TYPE_OPENING_RIGHT]],
            [['sum'], 'number'],

            [['comment'], 'string'],
            [['wall_material'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_doors' => 'Type Doors',
            'comment' => 'Comment',
            'wall_material' => 'Wall Material',
            'adherence' => 'Adherence',
            'type_opening' => 'Type Opening',
            'sum' => 'Sum',
        ];
    }
    public function getClientsDoors() {
        return $this->hasMany(ClientsDoors::className(), ['id_client' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceDoors() {
        return $this->hasMany(ServiceDoors::className(), ['id_doors' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServices() {
        return $this->hasMany(ServicePrice::className(), ['id' => 'id_service'])->viaTable('ServiceDoors', ['id_doors' => 'id']);
    }

    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);
        if (is_array($this->service)){
            $oldService = ArrayHelper::map($this->serviceDoors,'id_service','id');
            foreach ($this->service as $value){
                if (isset($oldService[$value])){
                    unset($oldService[$value]);
                }else{
                    $this->createNewService($value);
                }
            }
        }
    }

    private function createNewService($newService){
        if (!$service = ServicePrice::find()->andWhere(['name'=>$newService])->one()){
            if ($service instanceof ServicePrice){
                $serviceDoors = new ServiceDoors();
                $serviceDoors->id_doors = $this->id;
                $serviceDoors->id_service =$service->id;
                if ($serviceDoors->save()){
                    return true;
                }
                return false;
            }
        }
        return false;
    }

}
