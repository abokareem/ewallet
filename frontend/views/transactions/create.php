<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Transactions */

$this->title = 'Create Transactions';
$this->params['breadcrumbs'][] = ['label' => 'Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


 
$js = <<<JS

$("document").ready(function() {
        var senderWallets;
        var crossrate;
        var obj;
        var senderWalletId;
        var senderWalletCurrencyAmount;
        // console.log(senderWallets);


    function checkAmount() {
      var inpObj = document.getElementById("transactions-sender_currency_amount");
      if ( $("#transactions-sender_currency_amount").val() > senderWalletCurrencyAmount) {
        // document.getElementById("transactions-sender_currency_amount").placeholder = inpObj["There's not enough money for transaction!!! Max amount is " + senderWalletCurrencyAmount ]; // inpObj.validationMessage;
         $( "#transactions-recipient_currency_amount" ).val('');
         $( "#transactions-recipient_wallet_after_balance" ).val('');
         $( "#transactions-sender_currency_amount" ).val('');
      	
        alert("There's not enough money for transaction!!! Max amount is " + senderWalletCurrencyAmount );
      }
    }

    function ajaxRequest() {
      $.ajax({
            url: 'walletdata',
            type: "POST",
            dataType: "json",
            data: {
                'recipientWalletId': Number.parseInt( $("#transactions-recipient_wallet_id").val() ),
                'senderWalletId': Number.parseInt( $("#transactions-sender_wallet_id").val() )
            },
            success: function (result) {
                obj = JSON.parse(JSON.stringify(result));
                // console.log(obj);
            }
        });
    }



  $("#transactions-recipient_wallet_id", "#transactions-sender_wallet_id", "#transactions-sender_currency_amount").change(function() {
      ajaxRequest();
  });

  // entering sender wallet amount
  $("#transactions-sender_currency_amount").on('input keyup', function(e) {

      ajaxRequest();

      senderWalletId = $("#transactions-sender_wallet_id").val()
      // console.log(senderWalletId);
      // if (! typeof obj/*.senderWallets*/ == "undefined") {
            // alert('hello');


              senderWalletCurrencyId = obj.senderWallets[senderWalletId].currency_id;
              senderWalletCurrencyRate = Number.parseFloat(obj.rates[senderWalletCurrencyId].rate);
              senderWalletCurrencyAmount = Number.parseFloat(obj.senderWallets[senderWalletId].amount);

              $("#transactions-sender_currency_amount").attr({"max": senderWalletCurrencyAmount, "type": "number"});
              
              // console.log(senderWalletId);
              
              checkAmount();

              recipientWalletId = $("#transactions-recipient_wallet_id").val()
              recipientWalletCurrencyId = obj.recipientWallet[recipientWalletId].currency_id;
              // console.log(recipientWalletId+" "+recipientWalletCurrencyId+ " " + obj.rates[recipientWalletCurrencyId]);
              recipientWalletCurrencyRate = (recipientWalletCurrencyId == 0) ? 1 : obj.rates[recipientWalletCurrencyId].rate;               
              
              var crossrate =senderWalletCurrencyRate/recipientWalletCurrencyRate; 

              // console.log(recipientWalletId);

              // сумма перевода в валюте получателя после операции
              $("#transactions-recipient_currency_amount").val(
                      // $("#transactions-recipient_currency_amount").val(
                          $("#transactions-sender_currency_amount").val()*crossrate 
                      // )
              );

                    // console.log(crossrate);

              // изменение остатка кошелька получателя после операции
              $("#transactions-recipient_wallet_after_balance").val(
                      obj.recipientWallet[recipientWalletId]['amount'] / crossrate + Number.parseInt($("#transactions-sender_currency_amount").val())
              );   
      // } 
  });
        

  $("button.btn-success").click(function() {
          $.ajax({
            url: 'save-transaction-changes',
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

                
                
            }
        });
    });
    
});
JS;

$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js');
$this->registerJs($js);

?>



<div class="transactions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'userWallets' => $userWallets,
        'currency' => $currency,          
        'modelCurrency' => $modelCurrency,          
        'senderWallets' => $senderWallets,
        'rates' => $rates,
        'wallet_recipient_after_balance' => $wallet_recipient_after_balance,
    ]) ?>

</div>
