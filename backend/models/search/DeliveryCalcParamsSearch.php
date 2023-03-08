<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DeliveryCalcParams;

/**
 * DeliveryCalcParamsSearch represents the model behind the search form of `common\models\DeliveryCalcParams`.
 */
class DeliveryCalcParamsSearch extends DeliveryCalcParams
{
    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['dist_from', 'dist_to', 'is_active'], 'integer'],
            [['price'], 'number'],
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
        $query = DeliveryCalcParams::find();

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
            'dist_from' => $this->dist_from,
            'dist_to' => $this->dist_to,
            'price' => $this->price,
            'is_active' => $this->is_active,
        ]);

        return $dataProvider;
    }
}
