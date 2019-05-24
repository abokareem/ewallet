<?php

use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Html;


/* @var $this yii\web\View */

$script = <<< JS
function timestampToDate(ts) {
    var d = new Date();
    d.setTime(ts*1000);
    return ('0' + d.getHours()).slice(-2) + ':' + ('0' + d.getMinutes()).slice(-2) +':' + ('0' + d.getSeconds()).slice(-2) + '  ' + ('0' + d.getDate()).slice(-2) + '.' + ('0' + (d.getMonth() + 1)).slice(-2) + '.' + d.getFullYear();
}
var symbols;
$('#getrates').click(function(){
// $('window').ready(function(event){
        var a=$('input:checked'); //выбираем все отмеченные checkbox
        var symbols=[]; //выходной массив
         
        for (var x=0; x<a.length;x++){ //перебераем все объекты
                symbols.push(/*[a[x].value, */ $(a[x]).attr('id')/*]*/); //добавляем значения в выходной массив
        // symbols.push(); //добавляем значения в выходной массив
        }

      $.ajax({
            url: '/backend/web/yii2-get-currency-rates/default/get-api',
            type: 'POST',
            datatype: 'json',
            data: {'symbols': symbols},
            success: function(data) { 
                console.log(data);
                var obj = JSON.parse(data);
                var list = '';
                $.each(obj.rates, function(key, val) {
                  list += '<li>' + key + ': ' + val + '</li>';
                });
                // $(".body-content").append("<div class='currency'>"+"</div>");
                $('div.currency').html(
                    "Last rates update time: " + timestampToDate(obj.timestamp) + "<br />"+
                    "<b>New currency rates:</b> <br />"
                    + list 
                );
                // console.log(obj.oldRates);
            },
    })
})

$('.checkbox').change(function() {
// var a=$('input:checked'); //выбираем все отмеченные checkbox
// var out=[]; //выходной массив
 
// for (var x=0; x<a.length;x++){ //перебераем все объекты
//         out.push([a[x].value, $(a[x]).attr('id')]); //добавляем значения в выходной массив
//         // out.push(); //добавляем значения в выходной массив
//         }
// console.log(out); //с массивом делаем что угодно.    
});
JS;

$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js');
$this->registerJs($script, yii\web\View::POS_READY);

?>

<div class="site-index">

    <div class="jumbotron">

<?php Pjax::begin(); ?>
<!-- <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multypart/form-data'], 'id' => 'get-rates']); ?> -->
<div class="buttons">
        <?= Html::submitButton("Refresh criptocurrency rates", /*['yii2-get-currency-rates'], */['class' => 'getrates btn btn-lg btn-primary', 'id' => 'getrates']) ?>
</div>
<!-- <?php ActiveForm::end(); ?> -->

<?php Pjax::end(); ?>
        <!-- <p><?php echo Yii::getAlias('@getcurrencyrates').'\\views\default\api.php' ?></p> -->
<!--         <p><a class="btn btn-lg btn-success" href="http://ewallet/backend/web/yii2-get-currency-rates">Refresh criptocurrency rates</a></p>
 -->    </div>
 <?php //var_dump($lastRatesFromDB) ?>
    <div class="body-content">
    <div>
        <h3>Current currency rates</h3>
        <p>
            <?php echo "UpdateTime: $updateTime"; ?>
        </p>
        <p>Check currencies to update</p>
        <p>
            <?php foreach ($lastRatesFromDB as $key => $rates): ?>
            <div>
            <?php echo "<li><b>{$rates['name']}</b> :  {$rates['rate']}" . '   ';
            echo '<span class="check">';
            // echo  ($blockState[$key+1]["block_change"] == 1) ? "Update is blocked" : "Update is admitted";
            echo '</span>';
            ?>
            <input type="checkbox" class="checkbox" id="<?=$rates['name']?>" <?php echo ($blockState[$key+1]["block_change"] == 1) ? "" : ' checked="checked"'  ?> style="display: inline-block;" />

              <?  echo "</li>"; ?><br>
            <?php endforeach; ?>
            </div>
            <!-- <?php var_dump($blockState) ?> -->
        </p>
    </div>


        <div class="currency">
            
        </div>
    </div>
</div>
