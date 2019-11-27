<?php

namespace frontend\modules\doors\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ClientsSearch represents the model behind the search form of `frontend\modules\doors\models\Doors`.
 */
class OldDoorsSearch extends Doors {
    public $date_to;
    public $date_from;
    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id'], 'integer'],
            [['date_to','date_from'], 'safe'],
        ];
    }
    public function attributeLabels() {
        return [
            'date_to' => 'от',
            'date_from' => 'до',
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
        $query = OldDoors::find()->groupBy('date');
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

        $query->andFilterWhere(['>=','date',$this->date_from]);
        $query->andFilterWhere(['<=','date',$this->date_to]);
//        $query->andFilterWhere(['iLike','{{%Clients}}.address',$this->address]);
        return $dataProvider;
    }
}
