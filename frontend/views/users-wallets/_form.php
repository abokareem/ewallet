<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UsersWallets */
/* @var $form yii\widgets\ActiveForm */

// $authors = UsersWallets::find()->all();
$items = ArrayHelper::map(common\models\Currency::find()->asArray(true)->all(), 'id', 'name');
// $items = ['id' => [1,2,3,4], 					'name' => ["BTC","DOGE","ETH","LTC"]					];
// array_shift($items);
// $itemsKeys = $items;
// $items = array_column($items,null);
// $itemsKeys = array_keys(array_column($items,null));
// echo "<pre>"; die(var_dump($items));

?>

<div class="users-wallets-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'users_id')->textInput() ?>

    <!-- <?//= $form->field($currency, 'id')->dropDownList($items, ['id', 'name'], ['prompt' => 'Choose criptocurrency']) ?> -->
    <!-- <?//= Html::dropDownList('list', $itemsKeys, ArrayHelper::map($currency, 'id', 'name')) ?> -->

    <!-- // echo $form->field($model, 'status')->dropDownList($items,$params); -->
    <?= $form->field($model, 'currency_id')->dropDownList(
    	ArrayHelper::map(common\models\Currency::find()->asArray(true)->all(), 'id', 'name')
    	, ['id', 'name'], ['prompt' => 'Choose criptocurrency'])->label('Currency') ?>

    <?//= $form->field($model, 'currency')->textInput(['value' => $model->currency->name, ]) ?>

    <?= $form->field($model, 'users_id')->label(false)->hiddenInput(['value' => \Yii::$app->user->identity->id ]) ?>
    
    <?= $form->field($model, 'amount')->textInput() ?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
