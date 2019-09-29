<?php
/**
 * Created by PhpStorm.
 * User: user14
 * Date: 29.09.19
 * Time: 12:39
 */

namespace frontend\modules\doors\models;


use yii\base\Model;

class DoorsForm extends Model implements \DoorsInterface {

    public $typeDoors;
    public $typeOpening;
    public $adherence;
    public $sum;
    public $comment;
    public $walletMaterial;

    public function rules()
    {
        return [
            [['typeDoors', 'typeOpening'], 'default', 'value' => null],
            [['typeDoors', 'typeOpening'], 'integer'],

            ['typeDoors', 'in', 'range'=>[self::TYPE_DOORS_INTERIOR,self::TYPE_DOORS_IRON]],

            ['typeOpening','in','range'=>[self::TYPE_OPENING_MID,self::TYPE_OPENING_LEFT,self::TYPE_OPENING_RIGHT]],


            [['adherence'], 'boolean'],
            ['adherence', 'in', 'range'=>[self::ADHERENCE_LEFT,self::ADHERENCE_RIGHT]],


            [['sum'], 'number'],

            [['comment'], 'string'],
            [['wall_material'], 'string', 'max' => 255],
        ];
    }

    public function run() {
        $doors = new Doors();
        $doors->type_doors = $this->typeDoors;
        $doors->type_opening = $this->typeOpening;
        $doors->adherence =$this->adherence;
        $doors->sum = $this->sum;
        $doors->comment = $this->comment;
        $doors->wall_material =$this->walletMaterial;
        if (!$doors->save()) {
            return $doors->getErrors();
        }
    }
}