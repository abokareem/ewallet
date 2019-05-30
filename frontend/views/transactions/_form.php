<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use conquer\select2\Select2Widget;
// use kartik\depdrop\DepDrop;



// $this->registerJs($script, yii\web\View::POS_READY);

// Pjax::begin([
    // Опции Pjax
// ]);
/* @var $this yii\web\View */
/* @var $model common\models\Transactions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transactions-form">

    <?php $form = ActiveForm::begin([
    ]); ?>

    <?= $form->field($model, 'sender_wallet_id')->widget(
        Select2Widget::className(),
            [
                'items'=>ArrayHelper::map(common\models\UsersWallets::find()->where(['users_id' => \Yii::$app->user->identity->id])->asArray(true)->all(), 'id', 'name')
            ]
    )->label("Sender Wallet Name"); ?>


    <?= $form->field($model, 'recipient_wallet_id')->widget(
        Select2Widget::className(),
            [
                'items'=>ArrayHelper::map(common\models\UsersWallets::find()->asArray(true)->all(), 'id', 'name')
            ]
    )->label("Recipient Wallet Name"); ?>

    <?= $form->field($model, 'sender_currency_amount')->textInput(['type' => 'number', 'min' => 0]); ?>

    <?= $form->field($model, 'recipient_currency_amount')->textInput(['type' => 'number', 'readonly' => 'readonly']); ?>

    <?= $form->field($model, 'recipient_wallet_after_balance')->textInput(['type' => 'number', 'readonly' => 'readonly']) ?>


    <!-- <?//= $form->field($senderWallets, 'amount')->hiddenInput(['value' => 0])->label('Sender`s balance') ?> -->
    <?//= $form->field($userWallets, 'amount')->hiddenInput(['value' => 0])->label(false, ['style'=>'display:none']) ?>


    <?//= $form->field($model, 'recipient_currency_amount')->textInput( ArrayHelper::map(common\models\UsersWallets::find()->asArray(true)->all(), 'id', 'name')        , ['id', 'name'], ['prompt' => 'Choose your wallet']) ?>

<!--     <?//= $form->field($model, 'currency')->dropDownList( ArrayHelper::map(common\models\Currency::find()
        // ->asArray(true)
        // ->where(['id' => ArrayHelper::map(common\models\UsersWallets::find()->asArray(true)->all(), 'id', 'currency_id')])
        // ->all(), 
    // 'id', 'name')        , ['id', 'name'], ['prompt' => 'Choose currency']) ?> -->


    <div class="form-group">
        <?= Html::submitButton('Transfer', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php //Pjax::end(); ?>
</div>

