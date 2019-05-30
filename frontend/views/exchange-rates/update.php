<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ExchangeRates */

$this->title = 'Update Exchange Rates: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Exchange Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="exchange-rates-update">

<?php  //yii\helpers\VarDumper::dump($model->currency->block_change, 10, true); ?>
<?php  // yii\helpers\VarDumper::dump( Yii::$app->request->post(), 10, true); ?>
<?php  //yii\helpers\VarDumper::dump($this, 10, true); ?>
    <h1><?= Html::encode($this->title) ?></h1>
<?php //if (!$model->currency->block_change): ?>
    
    <?= $this->render('_form', [
        'model' => $model,
        // 'user' => $user,
        'modelCurrency' => $modelCurrency,
    ]) ?>
<?php // endif; ?>

</div>
