<?php
/**
 * Created by PhpStorm.
 * User: user14
 * Date: 28.09.19
 * Time: 16:52
 */

namespace frontend\modules\doors\models;


use yii\base\Model;

class DoorsForm extends Model {

    public $telefone;
    public $FIO;
    public $comment;
    public $street;
    public $house;
    public $porch;
    public $apartment;

    public function rules() {
        return [
            [['telephone'], 'default', 'value' => null],
            [['telephone'], 'integer'],
            [['comment'], 'string'],
            [['FIO', 'street', 'house', 'porch', 'apartment'], 'string', 'max' => 255],
        ];
    }

    public function run() {
        $client = new Clients();
        $client->FIO        = $this->FIO;
        $client->telephone  = $this->telefone;
        $client->comment    = $this->comment;
        $client->street     = $this->street;
        $client->house      = $this->house;
        $client->porch      = $this->porch;
        $client->apartment  = $this->apartment;
        $client->save();
    }
}