<?php

use yii\helpers\Html;
// use yii\widgets\ListView;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel common\models\UsersWalletsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users Wallets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-wallets-index">
<?php  //yii\helpers\VarDumper::dump($this, 10, true); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Users Wallets', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        // 'layout'=>"{sorter}\n{pager}\n{summary}\n{items}",

    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        // Обычные поля определенные данными содержащимися в $dataProvider.
        // Будут использованы данные из полей модели.
            'id',
            'name',
            'amount',
            [ 
                'label' => 'Wallet currency',
                'attribute'=> 'currencyname',                
                'value'=> 'currency.name',
            ],
            [ 
                'label' => 'Sender`s wallet email',
                'attribute'=> 'useremail',                
                'value'=> 'users.email',
            ],

        // $query->andFilterWhere(['like', 'name', $this->name]);
        // $query->andFilterWhere(['like', 'c.name', $this->currencyname]);
        // $query->andFilterWhere(['like', 'u.email', $this->useremail]);

        ['class' => 'yii\grid\ActionColumn',
            'header'=>'Actions', 
            'headerOptions' => ['width' => '50'],
                // 'template' => '{view} {delete} {update}',
                // 'controller' => 'imgs',
                'visibleButtons' => [
                    'view' => true,             
                    'delete' => function ($model) {
                        return  \Yii::$app->user->identity->id == $model->users_id; },
                    'update' => function ($model) {
                        return  \Yii::$app->user->identity->id == $model->users_id; },
                ],        
        ],
    ],
]); ?>

    <?//= ListView::widget([
        // 'dataProvider' => $dataProvider,
        // 'itemOptions' => ['class' => 'item'],
        // 'itemView' => function ($model, $key, $index, $widget) {
        //     return Html::a(Html::encode($model->name), ['view', 'id' => $model->id]);
        // },
    //]) ?>


</div>
