<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Transactions;

/**
 * TransactionsSearch represents the model behind the search form of `common\models\Transactions`.
 */
class TransactionsSearch extends Transactions
{
    public  $senderemail;
    public  $recipientemail;
    public  $senderwalletname;
    public  $recipientwalletname;
    public  $senderwalletcurrency;
    public  $recipientwalletcurrency;


    /*public function attributes()//для практики попробовал другой метод задавания атрибута
    {
        // делаем поле зависимости доступным для поиска
        return array_merge(parent::attributes(), ['users_wallets.name']);
    }*/

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sender_wallet_id', 'recipient_wallet_id'], 'integer'],
            [['sender_currency_amount', 'recipient_currency_amount'], 'number'],
            [['timestamp'], 'safe'],
            [['senderemail', 'recipientemail', 'senderwalletcurrency', 'recipientwalletcurrency', 'senderwalletname', 'recipientwalletname', 'senderWallet'], 'safe'],
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
        $query = Transactions::find();

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
//  todo убрать конфликт имен алиасом : Not unique table/alias: 'users_wallets'
//  если вы используете псевдоним s для связи с таблицей users_wallets, то joinWith будет выглядеть так:
// присоединяем зависимость `senderWallet` которая является связью с таблицей `users_wallets`
// и устанавливаем алиас таблицы в значение `users_wallets`
        $query->joinWith(['senderWallet s' => function($q) { $q->from(['s' => 'users_wallets']); }]);
        $query->joinWith(['recipientWallet r' => function($q) { $q->from(['r' => 'users_wallets']); }]);
        $query->joinWith(['senderWallet.users su']);
        $query->joinWith(['recipientWallet rw' => function($q) {
              $q->joinWith('users ru');
        }]);

        $query->joinWith(['recipientWallet rw' => function($q) {
                $q->joinWith(['currency']);
        }]);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            //'sender_wallet_id' => $this->sender_wallet_id,
            //'recipient_wallet_id' => $this->recipient_wallet_id,
            'sender_currency_amount' => $this->sender_currency_amount,
            'recipient_currency_amount' => $this->recipient_currency_amount,
            // 'timestamp' => $this->timestamp,
        ]);


        $query->andFilterWhere(['like', 'su.email', $this->senderemail])
        ->andFilterWhere(['like', 'ru.email', $this->recipientemail])
        ->andFilterWhere(['like', 's.name', $this->senderwalletname])
        ->andFilterWhere(['like', 'r.name', $this->recipientwalletname])
        ->andFilterWhere(['like', 's.c', $this->senderwalletcurrency])
        ->andFilterWhere(['like', 'r.c', $this->recipientwalletcurrency])
        ;


        // добавляем сортировку по колонке из зависимости
        $dataProvider->sort->attributes['su.email'] = [
            'asc' => ['su.email' => SORT_ASC],
            'desc' => ['su.email' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['ru.email'] = [
            'asc' => ['ru.email' => SORT_ASC],
            'desc' => ['ru.email' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['s.name'] = [
            'asc' => ['s.name' => SORT_ASC],
            'desc' => ['s.name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['r.name'] = [
            'asc' => ['r.name' => SORT_ASC],
            'desc' => ['r.name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['s.c'] = [
            'asc' => ['s.c' => SORT_ASC],
            'desc' => ['s.c' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['r.c'] = [
            'asc' => ['r.c' => SORT_ASC],
            'desc' => ['r.c' => SORT_DESC],
        ];


        return $dataProvider;
    }
}
