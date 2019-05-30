<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

// use yii\widgets\ListView;
use yii\grid\GridView;



/* @var $this yii\web\View */
/* @var $searchModel common\models\ExchangeRatesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Exchange Rates';
$this->params['breadcrumbs'][] = $this->title;

$script = <<< JS
//     function foo() {
//         return $currencies; //можно использовать переменные
//     }
// var symbols =  foo();
// var symbols =  <?php echo json_encode($currencies, JSON_PRETTY_PRINT) ?>;


// function timestampToDate(ts) {
//     var d = new Date();
//     d.setTime(ts*1000);
//     return ('0' + d.getHours()).slice(-2) + ':' + ('0' + d.getMinutes()).slice(-2) +':' + ('0' + d.getSeconds()).slice(-2) + '  ' + ('0' + d.getDate()).slice(-2) + '.' + ('0' + (d.getMonth() + 1)).slice(-2) + '.' + d.getFullYear();
// }
console.log(symbols);
// var symbols;
$('#updateAll').click(function(){
// $('window').ready(function(event){
        // var a=$('input:checked'); //выбираем все отмеченные checkbox
        // var symbols=[]; //выходной массив
         
        // for (var x=0; x<a.length;x++){ //перебераем все объекты
        //         symbols.push(/*[a[x].value, */ $(a[x]).attr('id')/*]*/); //добавляем значения в выходной массив
        // // symbols.push(); //добавляем значения в выходной массив
        // }


      var csrfToken = $('meta[name="csrf-token"]').attr("content");

      $.ajax({
            // url: '/yii2-get-currency-rates/default/get-api/',
            url: '/backend/web/yii2-get-currency-rates/default/get-api/',
            // url: '/@getcurrencyrates/default/get-rates',
            // url: '/backend/web/yii2-get-currency-rates/default/get-api',
            type: 'GET',
            datatype: 'json',
            data: {_csrf : csrfToken},

            // crossDomain: true,
            // contentType:'application/json; charset=utf-8',
    
            // data: {'symbols': ["BTC","ETH","DOGE","LTC"]},
            // data:JSON.stringify( symbols),
            // success: function(data) { 
            //     console.log('Return');

            //     console.log(data);
            //     var obj = JSON.parse(data);
            //     var list = '';
            //     $.each(obj.rates, function(key, val) {
            //       list += '<li>' + key + ': ' + val + '</li>';
            //     });
            //     // $(".body-content").append("<div class='currency'>"+"</div>");
            //     $('div.currency').html(
            //         "Last rates update time: " + timestampToDate(obj.timestamp) + "<br />"+
            //         "<b>New currency rates:</b> <br />"
            //         + list 
            //     );
                // console.log(obj.oldRates);
            // },
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


<div class="exchange-rates-index">

    <h1><?= Html::encode($this->title) ?></h1>
<?php // yii\helpers\VarDumper::dump($seachModel, 10, true); ?>
<?php // yii\helpers\VarDumper::dump($dataProvider, 10, true); ?>
<?php //yii\helpers\VarDumper::dump($currencies, 10, true); ?>

    <p>
        <?= Html::a('Update Exchange Rates', [/*'/yii2-get-currency-rates/default/get-api/'*/], ['class' => 'btn btn-success', 'id' => 'updateAll']) ?>
        <!-- http://ewallet/frontend/web/yii2-get-currency-rates/default -->
        <?//= Html::a('Create Exchange Rates', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?//= ListView::widget([
        // 'dataProvider' => $dataProvider,
        // 'itemOptions' => ['class' => 'item'],
        // 'itemView' => function ($model, $key, $index, $widget) {
        //     return Html::a(Html::encode($model->id), ['view', 'id' => $model->id]);
        // },
    //]) ?>
<?php 
Pjax::begin([
    // Опции Pjax
]);
 ?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        // 'layout'=>"{sorter}\n{pager}\n{summary}\n{items}",

    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        // Обычные поля определенные данными содержащимися в $dataProvider.
        // Будут использованы данные из полей модели.
            'id',
            'rate',
            [ 
                'label' => 'Currency title',
                'attribute'=> 'name',                
                'value'=> 'currency.name',
            ],
            [ 
                'label' => 'Is blocked to update',
                'attribute'=> 'block_change',                
                'value'=> 'currency.block_change',
            ],
            'update_time',
            // 'name',
        ['class' => 'yii\grid\ActionColumn',
            'header'=>'Actions', 
            'headerOptions' => ['width' => '50'],
            // 'template' => '{view} {delete} {link}',
            // 'update' => function ($url, $model, $key) {
                // return $currencies[$key]['block'] == 1 ? Html::a('Update', $url) : '';
            // },

            'buttons' => [
            //view button
                'update' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                'title' => Yii::t('app', 'update', $url),
                                // 'class'=>'btn btn-primary btn-xs',                                  
                    ]);
                },
            ],

            // 'urlCreator' => function ($action, $model, $key, $index) {
            //     if ($action === 'view') {
            //         $url ='/exchange-rates/view?id='.$model->block;
            //         return $url;
            // }
        
        ],
    ],
]);
?>
<?php Pjax::end(); ?>

</div>
<script type="text/javascript">
    var symbols =  
    <?php echo json_encode(
        array_column(
            array_filter($modelCurrency,
                function($c) { 
                    // if ($c['block']==1) break;
                    // return  $c['name'];
                    return $c['block']==0; 
                }
            ), 'name')
        , JSON_PRETTY_PRINT) ?>;
</script>