<?php

namespace frontend\controllers;

use Yii;
use common\models\Currency;
use common\models\ExchangeRates;
use common\models\ExchangeRatesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExchangeRatesController implements the CRUD actions for ExchangeRates model.
 */
class ExchangeRatesController extends Controller
{
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

    /**
     * Lists all ExchangeRates models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExchangeRatesSearch();
        // $searchModel->joinWith('currency');
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $modelCurrency = (new Currency)::find()
            ->select([ 'name', 'id', 'block_change as block'])
            ->asArray()
            ->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelCurrency' => $modelCurrency,
        ]);
    }

    /**
     * Displays a single ExchangeRates model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ExchangeRates model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ExchangeRates();
        $modelCurrency = new Currency();

        if ($model->load(Yii::$app->request->post('block_change')) && $model->save()) {
            return $this->redirect(['view', ['id' => $model->id, 'modelCurrency' => $modelCurrency]]);
        }

        return $this->render('create', [
            'model' => $model, 
            'modelCurrency' => $modelCurrency,

        ]);
    }

    /**
     * Updates an existing ExchangeRates model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        // ->join('currency')->select([ 'name', 'id', 'block_change as block']);
        // $model->currencies = Currency::find()
        //     ->select([ 'name', 'id', 'block_change as block'])
        //     ->asArray()
        //     ->all();
        $modelCurrency = Currency::findOne($id);//->one();   //  Yii::$app->request->get('id')
        // $modelCurrency = Currency::find()
        //     ->select([ 'name', 'id', 'block_change as block'])
        //     ->asArray()
        //     ->all();
        
    if ($model->load(Yii::$app->request->post()) && $model->save() ) 
        { 
            // die(var_dump(\Yii::$app->request->post()));
            $modelCurrency->block_change = Yii::$app->request->post(('Currency'))['block_change'];
            $modelCurrency->save(); 
            return $this->redirect(['view', 'id' => $model->id]);
        }



        // if (!$model->currency->block_change) {
        //     Yii::$app->runAction('@getcurrencyrates/default/get-rates', ['id' => $model->id]);
        //     // Yii::$app->runAction('yii2-get-currency-rates/default/get-rates/', ['id' => $model->id]);
        // }

        return $this->render('update', [
            'model' => $model,
            'modelCurrency' => $modelCurrency,
        ]);
    }

    /**
     * Deletes an existing ExchangeRates model.
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
     * Finds the ExchangeRates model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ExchangeRates the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ExchangeRates::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
