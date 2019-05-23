<?php

namespace frontend\controllers;

use Yii;
use common\models\UsersWallets;
use common\models\Currency;
use common\models\Users;
use common\models\UsersWalletsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsersWalletsController implements the CRUD actions for UsersWallets model.
 */
class UsersWalletsController extends Controller
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
     * Lists all UsersWallets models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersWalletsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UsersWallets model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        // $user = (new Users)->findOne(\Yii::$app->user->identity->id);//::findOne($id);
        $user = new Users;//::findOne($id);
        $currency = new Currency;//::find()->all(); 
        return $this->render('view', [
            'model' => $this->findModel($id),
            'user' => $user,
            'currency' => $currency,  
        ]);
    }

    /**
     * Creates a new UsersWallets model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UsersWallets();
        $user = (new Users)->findOne(\Yii::$app->user->identity->id);//::findOne($id);
        $currency = new Currency;//::find()->all();        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'user' => $user,
            'currency' => $currency,      
        ]);
    }

    /**
     * Updates an existing UsersWallets model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user = (new Users)->findOne(\Yii::$app->user->identity->id);//::findOne($id);
        $currency = new Currency;//::find()->all();

        $user->scenario = 'update';
        $currency->scenario = 'update';
        
        if (!isset($user)) {
            throw new NotFoundHttpException("The user was not found.");
        }        

        if (!isset($currency)) {
            throw new NotFoundHttpException("The currency was not found.");
        }    

        if ($model->load(Yii::$app->request->post()) /*&& $user->load(Yii::$app->request->post()) && $currency->load(Yii::$app->request->post())*/) 
        {
            $isValid = $model->validate() /*&& $user->validate() && $currency->validate()*/;
            if ($isValid) 
            {
                $model->save();
/*                $user->save(false);
                $currency->save(false);*/
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'user' => $user,
            'currency' => $currency,            
        ]);
    }

    /**
     * Deletes an existing UsersWallets model.
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
     * Finds the UsersWallets model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UsersWallets the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UsersWallets::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
