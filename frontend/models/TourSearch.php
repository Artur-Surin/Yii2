<?php

namespace app\models;

use yii\data\ActiveDataProvider;

class TourSearch extends Tour
{
    public $price;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'alias'], 'safe'],
            [['price'], 'number'],
        ];
    }

    public function search($params)
    {
        $query = Tour::find()->joinWith('tourPrice');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'title',
                    'calculatePrice' => [
                        'asc' => ['COALESCE(tour_prices.price_adult_sale,tour_prices.price_adult)' => SORT_ASC],
                        'desc' => ['COALESCE(tour_prices.price_adult_sale,tour_prices.price_adult)' => SORT_DESC],
                    ],
                ],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
