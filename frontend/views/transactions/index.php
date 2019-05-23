<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ListView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TransactionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transactions';
$this->params['breadcrumbs'][] = $this->title;
// $dataProvider = new ActiveDataProvider([
//     'query' => \common\models\Transactions::find(),
//     'pagination' => [
//         'pageSize' => 20,
//     ],
// ]);

?>
<?php //yii\helpers\VarDumper::dump($searchModel, 10, true); ?>

<div class="transactions-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Transactions', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php //yii\helpers\VarDumper::dump($searchModel , 10, true); ?>

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        // 'layout'=>"{sorter}\n{pager}\n{summary}\n{items}",

    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        // Обычные поля определенные данными содержащимися в $dataProvider.
        // Будут использованы данные из полей модели.
            'id',
            'sender_wallet_id',
            'recipient_wallet_id',
            'sender_currency_amount',
            'recipient_currency_amount',
            
            // 'senderWallet.name',
            [ 
                'label' => 'Sender`s wallet name',
                'attribute'=> 'sender_wallet_id',
                'value'=> 'senderWallet.name',
            ],
            // 'senderWallet.users.email',
            [ 
                'label' => 'Sender`s wallet email',
                'attribute'=> 'sender_wallet_id',
                'value' => 'senderWallet.users.email',            

            ],

            // 'recipientWallet.name',
            [ 
                'label' => 'Recipient`s wallet name',
                'attribute'=> 'recipient_wallet_id',
                'value'=> 'senderWallet.name',                
            ],            
            

            // 'recipientWallet.users.email',
            [ 
                'label' => 'Recipient`s wallet email',
                'attribute'=> 'recipient_wallet_id',                
                'value'=> 'recipientWallet.users.email',
            ],


            // 'senderWallet.currency.name',
            [ 
                'label' => 'Sender`s wallet currency name',
                'attribute'=> 'sender_wallet_id',
                'value'=> 'senderWallet.currency.name',

            ],

            // 'recipientWallet.currency.name',
            [ 
                'label' => 'Recipient`s wallet currency name',
                'attribute'=> 'recipient_wallet_id',
                'value'=> 'recipientWallet.currency.name',                
            ],


            'timestamp',
        // Более сложный пример.
        // [
        // 'class' => 'yii\grid\DataColumn', // может быть опущено, поскольку является значением по умолчанию
        //     'value' => function ($data) {
        //             return $data->name; // $data['name'] для массивов, например, при использовании SqlDataProvider.
        //         },
        //   ],

    ['class' => 'yii\grid\ActionColumn',
            'header'=>'Actions', 
            'headerOptions' => ['width' => '50'],
            'template' => '{view} {link}',
    ],
    ],
]);
?>

    <?//= ListView::widget([
        // 'dataProvider' => $dataProvider,
        // 'itemOptions' => ['class' => 'item'],
        // 'itemView' => function ($model, $key, $index, $widget) {
        //     return Html::a(Html::encode($model->id), ['view', 'id' => $model->id]);
        // },
        // 'itemView' => '_view',
    // ]) ?>

</div>
