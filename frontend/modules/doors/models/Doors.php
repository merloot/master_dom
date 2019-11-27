<?php

namespace frontend\modules\doors\models;

use common\models\User;
use Yii;
use common\interfaces\DoorsInterface;
use yii\db\Exception;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

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
 * @property integer $height_box
 * @property integer $depth_box
 * @property integer $width_box
 * @property integer $height_aperture
 * @property integer $depth_aperture
 * @property integer $width_aperture
 * @property integer $height_canvas
 * @property integer $depth_canvas
 * @property integer $width_canvas
 * @property integer $id_order
 *
 * @property ServicePrice[] $services
 * @property ServiceDoors[] $servicesDoors
 */
class Doors extends \yii\db\ActiveRecord implements DoorsInterface
{
    public $serviceDoors;

    public $service;

    public $clientName;
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
//            [['type_doors','adherence','type_opening'],'required'],
            [['serviceDoors'], 'safe'],
            [['clientName'], 'safe'],
            [['sum'],'default','value' => 0],
            [['type_doors', 'type_opening'], 'default', 'value' => null],
            [['type_doors', 'type_opening','user_id','adherence','id_order'], 'integer'],
            ['type_doors', 'in', 'range' => [self::TYPE_DOORS_INTERIOR, self::TYPE_DOORS_IRON]],

            ['adherence', 'in', 'range' => [self::ADHERENCE_INTERIOR_LEFT, self::ADHERENCE_INTERIOR_RIGHT, self::ADHERENCE_OUTDOOR_LEFT,self::ADHERENCE_OUTDOOR_RIGHT]],

            ['type_opening','in','range' => [self::TYPE_OPENING_MID,self::TYPE_OPENING_LEFT,self::TYPE_OPENING_RIGHT,self::TYPE_OPENING_OFF]],
            [
                [
                'sum',
                'height_box',
                'depth_box',
                'width_box',
                'height_aperture',
                'depth_aperture',
                'width_aperture',
                'height_canvas',
                'depth_canvas',
                'width_canvas'
                ],
                'number'
            ],

            [['comment'], 'string'],

            [['wall_material'], 'string', 'max' => 255],

//            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'user_id']],
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
            'serviceDoors' => 'serviceDoors',
            'id_order' => 'Номер заказа',
        ];
    }

    public function getAuthor() {
        return $this->hasOne(User::className(), [
            'id'=>'user_id'
        ]);
    }

    public function getServicesDoors() {
        return $this->hasMany(ServiceDoors::className(), [
            'id_doors' => 'id'
        ]);
    }


    public function getServices() {
        return $this->hasMany(ServicePrice::className(), [
            'id' => 'id_service'
        ])->viaTable('ServiceDoors', [
                'id_doors' => 'id'
        ]);
    }

    public function getOrder(){
        return $this->hasOne(Orders::className(),[
            'id_doors'=>'id'
        ]);
    }

    public function beforeSave($insert) {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        $this->user_id = Yii::$app->user->getId();
        return parent::beforeSave($insert);
    }

    public function beforeDelete() {
        if (parent::beforeDelete()){
            ServiceDoors::deleteAll(['id_doors'=>$this->id]);
            return true;
        }else{
            return false;
        }
    }

    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);
        $array = $this->serviceDoors;
        if (is_array($array)){
            foreach ($array as $value){
                $this->createNewsServices(Json::decode($value));
            }
        }if (empty($array)){
            return false;
        }
    }


    public function createNewsServices($array)
    {
        $door = self::findOne($this->id);
        if (is_array($array)) {
            foreach ($array as $value) {
                $service = ServicePrice::findOne($value['id']);
                $serviceDoors = new ServiceDoors();
                $serviceDoors->id_doors = $this->id;
                $serviceDoors->id_service = $value['id'];
                $serviceDoors->count_service = $value['value'];
                if ($serviceDoors->save()){
                    $door->sum += (float)$service->price * (int)$value['value'];
                    if ($door->save()){
                    }
                }
            }
        } else {
            $door = self::findOne($this->id);
            $service = ServicePrice::findOne($array['id']);
            $serviceDoors = new ServiceDoors();
            $serviceDoors->id_doors = $this->id;
            $serviceDoors->id_service = $array['id'];
            $serviceDoors->count_service = $array['value'];
            if ($serviceDoors->save()){
                $door->sum += (float)$service->price * (int)$array['value'];
                $door->save();
            }
        }
    }
}
