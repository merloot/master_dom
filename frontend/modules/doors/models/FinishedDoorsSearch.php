<?php

namespace frontend\modules\doors\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\doors\models\FinishedDoors;

/**
 * FinishedDoorsSearch represents the model behind the search form of `frontend\modules\doors\models\FinishedDoors`.
 */
class FinishedDoorsSearch extends FinishedDoors {
    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'type_doors', 'price'], 'integer'],
            [['name'], 'safe'],
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
        $query = FinishedDoors::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'type_doors' => $this->type_doors,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['ilike', 'name', $this->name]);

        return $dataProvider;
    }
}
