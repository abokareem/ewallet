<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>
        <p class="lead">You have successfully created your Yii-powered application.</p>
<!--        --><?//= \artembaranovsky\GetCurrencyRates::getRates(); ?>
<?php
//$module = \Yii::$app->getModule('GetCurrencyRates');

// var_dump(\Yii::$app->getModule('GetCurrencyRates'));

?>
        <p><a class="btn btn-lg btn-success" href="http://ewallet/backend/web/yii2-get-currency-rates">Refresh criptocurrency rates</a></p>
    </div>

    <div class="body-content">

        <div class="row">

        </div>

    </div>
</div>
