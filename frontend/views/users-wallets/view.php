<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UsersWallets */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users Wallets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="users-wallets-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--         <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            // 'class' => 'btn btn-danger',
            // 'data' => [
            //     'confirm' => 'Are you sure you want to delete this item?',
            //     'method' => 'post',
            // ],
        ]) ?> -->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        // 'user' => $user,
        // 'currency' => $currency, 
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => 'username',
                'format' => 'raw',
                'value' => $model->users["username"],
            ],
            [
                'attribute' => 'currency',
                'format' => 'raw',
                'value' => $model->currency->name,
            ],
            'amount',
        ],
    ]) ?>

</div>
