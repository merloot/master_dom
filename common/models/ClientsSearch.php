<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Clients;

/**
 * ClientsSearch represents the model behind the search form of `common\models\Clients`.
 */
class ClientsSearch extends Clients
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'telephone'], 'integer'],
            [['FIO', 'street', 'house', 'porch', 'apartment', 'comment'], 'safe'],
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
        $query = Clients::find();

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
            'telephone' => $this->telephone,
        ]);

        $query->andFilterWhere(['ilike', 'FIO', $this->FIO])
            ->andFilterWhere(['ilike', 'street', $this->street])
            ->andFilterWhere(['ilike', 'house', $this->house])
            ->andFilterWhere(['ilike', 'porch', $this->porch])
            ->andFilterWhere(['ilike', 'apartment', $this->apartment])
            ->andFilterWhere(['ilike', 'comment', $this->comment]);

        return $dataProvider;
    }
}
