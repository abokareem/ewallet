<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ExchangeRates;

/**
 * ExchangeRatesSearch represents the model behind the search form of `common\models\ExchangeRates`.
 */
class ExchangeRatesSearch extends ExchangeRates
{
    /**
     * {@inheritdoc}
     */
    public $name;   
    public $block_change;   

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['rate'], 'number'],
            [['name', 'update_time', 'block_change'], 'safe'],
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
        $query = ExchangeRates::find();//->joinWith('currency')->select('{{exchange_rates}}.*', 'name');
        // $exchangeRates = new ExchangeRates::find()
        //     ->joinWith('currency c', false, 'RIGHT JOIN')
        //     ->select([ 'name', 'rate', 'c.id as id', 'c.block_change as block'])
        //     ->asArray()
        //     ->all();
        // $currencies = new Currency::find()
        //     // ->joinWith('currency c', false, 'RIGHT JOIN')
        //     ->select([ 'name', 'id', 'block_change as block'])
        //     ->asArray()
        //     ->all();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $query->joinWith(['currency c'])->select([ '*' /*'name', 'rate', 'c.id as id', 'c.block_change as block'*/]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'rate' => $this->rate,
            'update_time' => $this->update_time,
            'block_change' => $this->block_change,

        ]);
        $query->andFilterWhere(['like', 'c.name', $this->name]);
        // ->andFilterWhere(['like', 'c.name', $this->name]);

        // добавляем сортировку по колонке из зависимости
        $dataProvider->sort->attributes['name'] = [
            'asc' => ['name' => SORT_ASC],
            'desc' => ['name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['update_time'] = [
            'asc' => ['update_time' => SORT_ASC],
            'desc' => ['update_time' => SORT_DESC],
        ];
        
        $dataProvider->sort->attributes['block_change'] = [
            'asc' => ['block_change' => SORT_ASC],
            'desc' => ['block_change' => SORT_DESC],
        ];
        return $dataProvider;
    }
}
