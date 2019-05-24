<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\QueryBuilder;

/**
 * This is the model class for table "exchange_rates".
 *
 * @property int $id
 * @property double $rate
 *
 * @property Currency $id0
 */
class ExchangeRates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exchange_rates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rate'], 'number'],
            // [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rate' => 'Rate',
            'name' => 'Name',   //
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Currency::className(), ['id' => 'id']);
    }

    public static function saveLastRates($rates)
    {
/*        $exchangeRates = new ExchangeRates();
        $oldRates = $exchangeRates::find()
            ->joinWith('currency c')
            ->select([ 'name', 'rate', ['c.id' =>'currency_id']
                ])
            ->asArray()
            ->all();

        $exchangeRates::deleteAll();
        $id = 1;
        // die(var_dump("<pre>",$exchangeRates ,"</pre>"));
        foreach ($oldRates as $oldRate) {
                $rate = new ExchangeRates();
                $rate->currency_id = $oldRate->currency_id;
                $rate->rate = $oldRate->rate;
                $rate->id = $id++;
                $rate->save();
        }  */ 

        $exchangeRates = new ExchangeRates();
        $exchangeRates = $exchangeRates::find()
            ->joinWith('currency c', false, 'RIGHT JOIN')
            ->select([ 'name', 'rate', 'c.id as id'])
            ->asArray()
            ->all();
        unset($oldRates[0]);
        $oldRates = $exchangeRates;
        // exchangeRates::deleteAll();

        $i=0;
        if ($rates){        
            foreach ($oldRates as $OldRate) {
                if (array_search($oldRate['name'], 
                        array_keys($rates)   )) {
                    $rates[$i]['id'] = $oldRate['id'];
                }

            }
        }
// $rates = array(array_column($rates, null),
//                         array_keys($rates));
$i=0;
foreach ($rates as $key => $rate) {
    $newrates[] = [ 'id' => ++$i, 'rate' => $rates[$key],  'name' => $key]; 
}
       // $rates = array_column($rates, null);
// var_dump("<pre>",array_column($rates, null), "</pre>");
$rates = $newrates;
// var_dump("<pre>", $newrate, "</pre>");

        foreach ($rates as $key => $rate) {
                $exchangeRates = new ExchangeRates();
// var_dump("<pre>", $rate, "</pre>");
                exchangeRates::deleteAll('id=:id', ['id' => $rate['id']]);    // numeration from 1
                $exchangeRates->rate = $rate['rate'];
                // $exchangeRates->currency_id = $oldRates[$i]['id'];
                $exchangeRates->currency_id = $rate['id'];
                $exchangeRates->id = $rate['id'];
                if ($exchangeRates->validate()) {
                    $exchangeRates->save();
                }
        } 
        // foreach ($rates as $key => $rate) {
        //         $exchangeRates = new ExchangeRates();
        //         $exchangeRates->rate = $rate;
        //         // $exchangeRates->currency_id = $oldRates[$i]['id'];
        //         $exchangeRates->currency_id = $id;
        //         $exchangeRates->id = $id++;
        //         $exchangeRates->save();
        // } 
        // return $oldRates;   //  удалить!!!!!!!!!!!!!!!!!!!!!!!!!!! 
    }

    public function getName()
    {
        return $this->hasOne(Currency::className(), ['id' => 'currency_id']);
    }

    public function getCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'currency_id']);
    }

    public function getLastRatesFromDB()
    {
        // $currencies = Currency::find()->all();
        // $lastRatesFromDB = ArrayHelper::map(ExchangeRates::find()->asArray(true)->all(), 'id', 'rate');

        $lastRatesFromDB = ExchangeRates::find()
            ->join('RIGHT JOIN', 'currency', 'currency.id = exchange_rates.id')
            ->select([ 'name', 'rate'
                // '{{exchange_rates}}.*', // получить все атрибуты валют
            ])
            ->asArray(true)
            ->all();
            unset($lastRatesFromDB[0]);

        $updateTime = ExchangeRates::find()->asArray(true)/*->where(['id' => 1])*/->one();
        // return $lastRatesFromDB;
        // return $updateTime["update_time"];
        return ['lastRatesFromDB'=> $lastRatesFromDB, 'updateTime' => $updateTime["update_time"]];
    }


    
}