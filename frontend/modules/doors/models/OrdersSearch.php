<?php

namespace frontend\modules\doors\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * OrdersSearch represents the model behind the search form of `frontend\modules\doors\models\Orders`.
 */
class OrdersSearch extends Orders {
    public $address;
    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id_order'], 'integer'],
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
    public function scenarios() {
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
    public function search($params) {
        $query = Orders::find()->select(['id_order','id_client'])->groupBy(['id_order','id_client'])->joinWith('client');
//        var_dump($query);
//        die();
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
            'id_order' => $this->id_order,
        ]);

        $query->andFilterWhere(['like','{{%Clients}}.address',$this->address]);
        return $dataProvider;
    }
}
