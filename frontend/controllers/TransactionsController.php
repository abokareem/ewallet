<?php

namespace frontend\controllers;

use Yii;
use common\models\UsersWallets;
use common\models\Transactions;
use common\models\Currency;
use common\models\ExchangeRates;
use common\models\TransactionsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use conquer\select2\Select2Action;
use yii\db\ActiveQuery;

/**
 * TransactionsController implements the CRUD actions for Transactions model.
 */


class TransactionsController extends Controller
{
    // public function beforeAction($action) {
    //    $this->enableCsrfValidation = false;
    //    return parent::beforeAction($action);
    // }   

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

/*    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        // ...custom code here...
        // $balance = 
        return true;
    }*/


    /**
     * Lists all Transactions models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $email = Transactions::find()->one()->getUsersWallets()->all();
        // var_dump("<pre>",$email);
        
        // $users = Transactions::find()->one()->/*getRecipientWallet()->*/asArray()->all();
        // var_dump("<pre>",$users);

        // $email = Transactions::find()->one()->getSenderEmail()->asArray()->all();
        // var_dump("<pre>",Transactions::find()->one()->recipientWallet->recipientId->email);

        $searchModel = new TransactionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Transactions model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $userWallets = new UsersWallets;//::findOne($id);
        $currency = new Currency;//::find()->all(); 
        return $this->render('view', [
            'model' => $this->findModel($id),
            'userWallets' => $userWallets,
            'currency' => $currency,  
        ]);
    }

    /**
     * Creates a new Transactions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Transactions();
        $userWallets =  new UsersWallets;//::find(['id' =>\Yii::$app->user->identity->id]);
        $currency = new Currency;//::find()->all(); 

        // generating arrays with sender wallets / currency / amount / rates
        $rates = ArrayHelper::index(\common\models\ExchangeRates::find()->asArray(true)->all(), 'id');

        $senderWallets =ArrayHelper::index(\common\models\UsersWallets::find()->select('users_wallets.*')/*->joinWith('currency')*/->leftJoin('currency', '`currency`.`id` = `users_wallets`.`currency_id`')->where(['users_id' => \Yii::$app->user->identity->id])->asArray(true)->all(), 'id');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'userWallets' => $userWallets,
            'currency' => $currency,  
            'senderWallets' => $senderWallets,
            'rates' => $rates,
        ]);
    }

    /**
     * Updates an existing Transactions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Transactions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Transactions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Transactions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Transactions::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function save($runValidation = true, $attributeNames = null)
    {
        if ($this->getIsNewRecord()) {
            return $this->insert($runValidation, $attributeNames);
        } else {
            return $this->update($runValidation, $attributeNames) !== false;
        }
    }

    public function actionWalletdata()
    {
        $recipientWalletId = Yii::$app->request->post('recipientWalletId');
        $senderWalletId = Yii::$app->request->post('recipientWalletId');

        $rates = ArrayHelper::index(\common\models\ExchangeRates::find()->asArray(true)->all(), 'id');
        $senderWallets =ArrayHelper::index(\common\models\UsersWallets::find()->select('users_wallets.*')/*->joinWith('currency')*/->leftJoin('currency', '`currency`.`id` = `users_wallets`.`currency_id`')->where('users_wallets.id=:id')->addParams([':id' => (int)Yii::$app->request->post('senderWalletId')])/*->where(['users_id' => \Yii::$app->user->identity->id])*/->asArray(true)->all(), 'id');
        
        $recipientWallet =ArrayHelper::index(\common\models\UsersWallets::find()->select('users_wallets.*')->joinWith(['currency' => function ($q) {
            $q->from(['c' => Currency::tableName()]);  }])/*->leftJoin('currency', '`currency`.`id` = `users_wallets`.`currency_id`')*/->where('users_wallets.id=:id')->addParams([':id' => (int)Yii::$app->request->post('recipientWalletId')])->asArray(true)->all(), 'id');
        // $recipientWalletBalance = UsersWallets::findOne((int)Yii::$app->request->post('recipientWalletId'))->select('amount')->asArray(true);
        $recipientWalletBalance = /*ArrayHelper::map*/(\common\models\UsersWallets::find($recipientWalletId)->asArray()->one()["amount"]/*->all()*//*, 'id', 'amount'*/);
        // die(var_dump('<pre>', $recipientWalletBalance, '</pre>'));
        // return json_encode($senderWallets);
                // $recipientWalletBalance = ArrayHelper::index(\common\models\UsersWallets::findOne((int)Yii::$app->request->post('recipientWalletId'))->select('amount')/*->joinWith(['currency' => function ($q) {
            // $q->from(['c' => Currency::tableName()]);  }])*//*->leftJoin('currency', '`currency`.`id` = `users_wallets`.`currency_id`')*//*->where('users_wallets.id=:id')->addParams([':id' => ])*/->asArray(true), 'id');
        // return json_encode($senderWallets);
        return json_encode(["senderWallets" => $senderWallets, 'recipientWallet' => $recipientWallet, "rates" => $rates, 'recipientWalletBalance' => $recipientWalletBalance]);
    }


    public function actionSaveTransactionChanges(){

        $senderWalletChange = Yii::$app->request->post('senderWalletChange');
        $recipientWalletChange = Yii::$app->request->post('recipientWalletChange');

        $recipientWalletId = Yii::$app->request->post('recipientWalletId');
        $recipientWallet = \common\models\UsersWallets::findOne($recipientWalletId);
        $recipientWallet->amount = $recipientWallet->amount + $recipientWalletChange;
        $recipientWallet->save();

        $senderWalletId = Yii::$app->request->post('senderWalletId');
        $senderWallet = \common\models\UsersWallets::findOne($senderWalletId);
        $senderWallet->amount = $senderWallet->amount - $senderWalletChange;
        $senderWallet->save();

    }


    public function actions()
    {
        return [
            'ajax' => [
                'class' => Select2Action::className(),
                'dataCallback' => [$this, 'dataCallback'],
            ],

            'sender_amount' => [
                'class' => Select2Action::className(),
                'dataCallback' => [$this, 'sender_amount_dataCallback'],
            ],

        ];
    }
    /**
     * 
     * @param string $q
     * @return array
     */
    public function dataCallback($q)
    {
        $query = new ActiveQuery(UsersWallets::className());
        return [
            'results' =>  $query->select([
                    'users_wallets.amount as amount',
/*                    'currency_id as currency_id',
                    // 'catalog_name as text', 
                    // 'catalog_id as id',*/
                ])
                ->Where(['id' => $q])
                ->asArray()
                ->limit(20)
                ->all(),
        ];
    }

    public function sender_amount_dataCallback($q)
    {
        $query = new ActiveQuery(UsersWallets::className());
        return [
            'results' =>  $query->select([
                    'users_wallets.currency_id as currency_id',
/*                    'currency_id as currency_id',
                    // 'catalog_name as text', 
                    // 'catalog_id as id',*/
                ])
                // ->filterWhere(['like', 'currency', $q])
                ->asArray()
                ->limit(20)
                ->all(),
        ];
    }

/*  //http://demos.krajee.com/widget-details/depdrop#basic-usage    Scenario 3
    public function actionChildAccount() {
    }*/


}
