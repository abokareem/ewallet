<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UsersWallets */

$this->title = 'Create Users Wallets';
$this->params['breadcrumbs'][] = ['label' => 'Users Wallets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-wallets-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
