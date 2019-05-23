<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TransactionsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transactions-search">
<?php         //var_dump("<pre>", $model, "</pre>");   ?>
<?php //yii\helpers\VarDumper::dump($model, 10, true); ?>
<?php //yii\helpers\VarDumper::dump($dataProvider, 10, true); ?>
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?//= $form->field($model, 'sender_wallet_id') ?>

    <?//= $form->field($model, 'recipient_wallet_id') ?>

    <?= $form->field($model, 'sender_currency_amount') ?>

    <?= $form->field($model, 'recipient_currency_amount') ?>

    <?= $form->field($model, 'senderemail') ?>

    <?= $form->field($model, 'recipientemail') ?>

    <?php //echo $form->field($model, 'timestamp')->widget(\yii\widgets\MaskedInput::className(), [
        // 'model' => $model,
        // 'attribute' => 'date',
        // 'name' => 'date',
        // 'mask' => '99/99/9999',
//]); ?>

    <?php //echo $form->field($model, "timestamp")->widget(DateControl::classname(), ['type' => DateControl::FORMAT_DATETIME, 'displayFormat' => 'dd/MM/yyyy', 'autoWidget' => false, 'widgetClass' => 'yii\\widgets\\MaskedInput', 'options' => ['mask' => '99/99/9999', 'options' => ['class' => 'form-control', 'placeholder' => 'Data nascimento...']]]) ?>

    <?php echo $form->field($model, 'senderwalletcurrency') ?>
    <?php echo $form->field($model, 'recipientwalletcurrency') ?>
    <?php echo $form->field($model, 'senderwalletname') ?>
    <?php echo $form->field($model, 'recipientwalletname') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
