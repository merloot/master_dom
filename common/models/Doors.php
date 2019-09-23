<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Doors".
 *
 * @property int $id
 * @property int $type_doors
 * @property string $comment
 * @property string $wall_material
 * @property bool $adherence
 * @property int $type_opening
 * @property string $sum
 */
class Doors extends \yii\db\ActiveRecord
{
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
            [['comment'], 'string'],
            [['adherence'], 'boolean'],
            [['sum'], 'number'],
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
}
