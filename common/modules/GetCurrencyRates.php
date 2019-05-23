<?php

namespace common\modules;
use Yii;
/**
 * yii2-get-currency-rates module definition class
 */
class GetCurrencyRates extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'common\modules\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        // echo "<br>helloworld!<br>";
        parent::init();
        // Yii::setAlias('@getcurrencyrates', 'common\modules');
        GetCurrencyRates::setAliases(
            [
                // '@models' => '@app/models', // an existing alias
                '@getcurrencyrates' =>  '/common/modules',  // a directory
            ]
        );
        // custom initialization code goes here
    }


    public function getRates()
    {
        // $module = \Yii::$app->getModule('GetCurrencyRates');



    }



    /*

There are 5 main API Endpoints (listed below) through which you can access different kinds of data, all starting out with this Base URL:

http://api.coinlayer.com/api/

Simply attach your unique API access key to one of the endpoints as a query parameter:

http://api.coinlayer.com/api/live?access_key=2662d865660f33044d955b13e1502011




    // "historical" endpoint - request historical rates for a specific day
//https://coinlayer.com/quickstart
http://api.coinlayer.com/api/YYYY-MM-DD

    ? access_key = YOUR_ACCESS_KEY
    & target = GBP
    & symbols = BTC,ETH

// Artem, click on the URL above to request historical data from
// 2018-04-30 for the currencies Bitcoin and Ethereum


    */  
}
