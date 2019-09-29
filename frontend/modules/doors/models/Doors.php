<?php

namespace frontend\modules\doors\models;

use common\models\User;
use Yii;
use common\interfaces\DoorsInterface;
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
 * @property int user_id
 *
 * @property ClientsDoors[] $clientsDoors
 * @property ServiceDoors[] $serviceDoors
 * @property ServicePrice[] $services
 */
class Doors extends \yii\db\ActiveRecord implements DoorsInterface
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
            [['type_doors', 'type_opening','user_id'], 'integer'],
            ['type_doors', 'in', 'range'=>[self::TYPE_DOORS_INTERIOR,self::TYPE_DOORS_IRON]],



            [['adherence'], 'boolean'],
            ['adherence', 'in', 'range'=>[self::ADHERENCE_LEFT, self::ADHERENCE_RIGHT]],

            ['type_opening','in','range'=>[self::TYPE_OPENING_MID,self::TYPE_OPENING_LEFT,self::TYPE_OPENING_RIGHT]],
            [['sum'], 'number'],

            [['comment'], 'string'],

            [['wall_material'], 'string', 'max' => 255],

            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'p_user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_doors' => 'Тип устанавливаемой двери',
            'comment' => 'Комментарий',
            'wall_material' => 'Материал стен',
            'adherence' => 'Сторонность',
            'type_opening' => 'Вид проема в плане',
            'sum' => 'Сумма',
        ];
    }

    public function getAuthor(){
        return $this->hasOne(User::className(),['id'=>'user_id']);
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

    public function beforeSave($insert) {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        $this->user_id = Yii::$app->user->getId();
        return parent::beforeSave($insert);
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
