<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ExchangeRates */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Exchange Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="exchange-rates-view">
<? // var_dump($model) ?>
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
            [ 
                'label' => 'Currency name',
                'value' => $model->currency->name,
            ],
            [ 
                'label' => 'Rate to USD',
                'value' => $model->rate,
            ],
            [ 
                'label' => 'Is blocked to update',
                'value' => $model->currency->block_change,
            ],
            // 'rate',
        ],
    ]) ?>

</div>
