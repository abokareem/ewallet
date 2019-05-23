<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UsersWallets */

$this->title = 'Update Users Wallets: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users Wallets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="users-wallets-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_update_form', [
        'model' => $model,
        'user' => $user,
        'currency' => $currency, 
    ]) ?>

</div>
