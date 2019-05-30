<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "currency".
 *
 * @property int $id
 * @property string $name
 *
 * @property ExchangeRates $exchangeRates
 * @property UsersWallets[] $usersWallets
 */
class Currency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'currency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExchangeRates()
    {
        return $this->hasOne(ExchangeRates::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersWallets()
    {
        return $this->hasMany(UsersWallets::className(), ['currency_id' => 'id']);
    }

    public function getCurrencyTitles(){
        // $model = Currency::findAll();
        $currencies = ArrayHelper::map(Currency::find()->asArray()->all(), 'id', 'name');
        array_shift($currencies);   // delete USD symbol
        // die(var_dump($currencies));
        return $currencies;
    }


}
