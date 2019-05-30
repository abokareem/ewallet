<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Transactions */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="transactions-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'sender_wallet_id',
            'recipient_wallet_id',
            'sender_currency_amount',
            'recipient_currency_amount',

            'senderWallet.users.email',
            'recipientWallet.users.email',
            [ 
                'label' => 'Sender`s wallet name',
                'value' => $model->senderWallet->name,
            ],

            [ 
                'label' => 'Recipient`s wallet name',
                'value' => $model->recipientWallet->name,
            ],

            [ 
                'label' => 'Sender`s wallet currency name',
                'value' => $model->senderWallet->currency->name,
            ],

            [ 
                'label' => 'Recipient`s wallet currency name',
                'value' => $model->recipientWallet->currency->name,
            ],

            'timestamp',
        ],
    ]) ?>

</div>
