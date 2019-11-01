<?php

namespace frontend\modules\doors\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ClientsSearch represents the model behind the search form of `frontend\modules\doors\models\Doors`.
 */
class DoorsSearch extends Doors
{
    public $address;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['date_create'], 'safe'],
            [['address'], 'safe'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'address' => 'адрес',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Doors::find()->joinWith('client');
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like','{{%Clients}}.address',$this->address]);
        return $dataProvider;
    }
}
