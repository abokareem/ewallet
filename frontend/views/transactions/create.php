<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Transactions */

$this->title = 'Create Transactions';
$this->params['breadcrumbs'][] = ['label' => 'Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transactions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'userWallets' => $userWallets,
        'currency' => $currency,          
        'senderWallets' => $senderWallets,
        'rates' => $rates,
    ]) ?>

</div>
