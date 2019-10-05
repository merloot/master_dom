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
 * @property integer $date_create
 *
 * @property ClientsDoors[] $clientsDoors
 * @property ServicePrice[] $services
 */
class Doors extends \yii\db\ActiveRecord implements DoorsInterface
{
    public $serviceDoors;

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
            [['serviceDoors'], 'safe'],
            [['type_doors', 'type_opening'], 'default', 'value' => null],
            [['type_doors', 'type_opening','user_id'], 'integer'],
            ['type_doors', 'in', 'range' => [self::TYPE_DOORS_INTERIOR, self::TYPE_DOORS_IRON]],

            [['adherence'], 'integer'],
            ['adherence', 'in', 'range' => [self::ADHERENCE_INTERIOR_LEFT, self::ADHERENCE_INTERIOR_RIGHT, self::ADHERENCE_OUTDOOR_LEFT,self::ADHERENCE_OUTDOOR_RIGHT]],

            ['type_opening','in','range' => [self::TYPE_OPENING_MID,self::TYPE_OPENING_LEFT,self::TYPE_OPENING_RIGHT]],
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

            [['date_create'], 'date', 'format' => 'php:Y-m-d'],
            [['date_create'], 'default', 'value' => date('Y-m-d')],

            [['comment'], 'string'],

            [['wall_material'], 'string', 'max' => 255],

            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'user_id']],
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
        ];
    }

    public function getAuthor(){
        return $this->hasOne(User::className(),['id'=>'user_id']);
    }

//    public function getTest() {
//        return $this->hasMany(ClientsDoors::className(), ['id_client' => 'id']);
//    }
    public function getTest() {
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
        $this->user_id = Yii::$app->user->id;
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

    public function afterFind() {
        $this->service = ArrayHelper::map($this->services,'name','name');
    }

    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);
        if (is_array($this->serviceDoors)){
            foreach ($this->serviceDoors as $value){
                $this->createNewsServices($value);
            }
        }
    }

    public function createNewsServices($value)
    {
        if ($service = ServicePrice::findOne($value)) {
            $serviceDoors = new ServiceDoors();
            $serviceDoors->id_doors = $this->id;
            $serviceDoors->id_service = $service->id;
            $serviceDoors->count_service = $value->count;
            if ($serviceDoors->save()) {
                return false;
            }
        }
        return false;
    }
}
