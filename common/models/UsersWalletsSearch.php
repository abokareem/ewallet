<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UsersWallets;

/**
 * UsersWalletsSearch represents the model behind the search form of `common\models\UsersWallets`.
 */
class UsersWalletsSearch extends UsersWallets
{
    /**
     * {@inheritdoc}
     */
    public $currencyname;

    public function rules()
    {
        return [
            [['id', 'users_id', 'currency_id'], 'integer'],
            [['name', 'currencyname' , 'useremail'], 'safe'],
            [['amount'], 'number'],
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
        $query = UsersWallets::find();

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
            'users_id' => $this->users_id,
            'currency_id' => $this->currency_id,
            'amount' => $this->amount,
        ]);
        // $query->joinWith(['currency c' => function($q) { $q->from(['c' => 'currency']); }]);
        $query->joinWith(['currency c']);
        $query->joinWith(['users u']);
        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'c.name', $this->currencyname]);
        $query->andFilterWhere(['like', 'u.email', $this->useremail]);


        return $dataProvider;
    }
}
