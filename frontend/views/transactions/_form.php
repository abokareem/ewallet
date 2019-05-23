<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use conquer\select2\Select2Widget;
// use kartik\depdrop\DepDrop;


$js = <<<JS


function checkAmount() {
  var inpObj = document.getElementById("transactions-sender_currency_amount");
  // if (!inpObj.checkValidity()) {
  if ( $("#transactions-sender_currency_amount").val() > senderWalletCurrencyAmount) {
    alert("There's not enough money for transaction!!! Max amount is " + senderWalletCurrencyAmount );
    // document.getElementById("transactions-sender_currency_amount").placeholder = inpObj["There's not enough money for transaction!!! Max amount is " + senderWalletCurrencyAmount ];//inpObj.validationMessage;
  }
}

function ajaxRequest() {
  $.ajax({
        url: 'walletdata',
        // url: "' . Url::to(['transactions/walletdata']) . '",
        type: "POST",
        dataType: "json",
        data: {
            'recipientWalletId': Number.parseInt( $("#transactions-recipient_wallet_id").val() ),
            'senderWalletId': Number.parseInt( $("#transactions-sender_wallet_id").val() )
        },
        success: function (result) {
            obj = JSON.parse(JSON.stringify(result));
            console.log(obj);
        }
    });
}


        var senderWallets;
        var crossrate;
        var obj;
        var senderWalletId;
        var senderWalletCurrencyAmount;
        // console.log(senderWallets);



        $("document").ready(function() {
            $("#transactions-recipient_wallet_id", "#transactions-sender_wallet_id", "#transactions-sender_currency_amount").change(function() {
                ajaxRequest();
            });

            // entering sender wallet amount

            $("#transactions-sender_currency_amount").keyup(function() {
                ajaxRequest();
                senderWalletId = $("#transactions-sender_wallet_id").val()
                console.log(obj);
                senderWalletCurrencyId = obj.senderWallets[senderWalletId].currency_id;
                senderWalletCurrencyRate = Number.parseFloat(obj.rates[senderWalletCurrencyId].rate);
                senderWalletCurrencyAmount = Number.parseFloat(obj.senderWallets[senderWalletId].amount);
                $("#transactions-sender_currency_amount").attr({"max": senderWalletCurrencyAmount, "type": "number"});
                console.log(senderWalletId);
                checkAmount();
                recipientWalletId = $("#transactions-recipient_wallet_id").val()
                recipientWalletCurrencyId = obj.recipientWallet[recipientWalletId].currency_id;
                // console.log(recipientWalletId+" "+recipientWalletCurrencyId+ " " + obj.rates[recipientWalletCurrencyId]);
                recipientWalletCurrencyRate = (recipientWalletCurrencyId == 0) ? 1 : obj.rates[recipientWalletCurrencyId].rate;               
                var crossrate =senderWalletCurrencyRate/recipientWalletCurrencyRate; 
                $("#transactions-recipient_currency_amount").text(
                        $("#transactions-recipient_currency_amount").val(
                            $("#transactions-sender_currency_amount").val()*crossrate 
                        )
                );    
            });
            
            $("button.btn-success").click(function() {
                  $.ajax({
                    url: 'save-transaction-changes',
                    // url: "' . Url::to(['transactions/walletdata']) . '",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'recipientWalletId': Number.parseInt( $("#transactions-recipient_wallet_id").val() ),
                        'senderWalletId': Number.parseInt( $("#transactions-sender_wallet_id").val() ),
                        'senderWalletChange': Number.parseFloat( $("#transactions-sender_currency_amount").val() ),
                        'recipientWalletChange': Number.parseFloat( $("#transactions-recipient_currency_amount").val() )
                    },
                    success: function (result) {
                        // obj = JSON.parse(JSON.stringify(result));
                        // console.log(obj);
                        
                        /*
                        TODO
                        при нажатии кнопки сабмит аяксом передаешь айди двух кошельков и суммы списания/начисления, в екшене ищешь по айди два кошелька, меняешь им суммы и сохраняешь, создаешь модель для транзакции и заносишь туда же эти данные, сохраняешь, профит
а кошелек получателя... - ты же его как-то находишь? значит получаешь модель, а из нее и его айди
                        */
                        
                        
                    }
                });
            });
            
    });
JS;
 
$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js');
$this->registerJs($js);

$this->registerJs($script, yii\web\View::POS_READY);

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

    <?= $form->field($model, 'sender_currency_amount')->textInput(); ?>

    <?= $form->field($model, 'recipient_currency_amount')->textInput(); ?>

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

