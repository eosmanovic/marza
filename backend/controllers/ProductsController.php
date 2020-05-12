<?php

namespace backend\controllers;

use Yii;
use common\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Type;
use common\models\search\ProductSearch;
/**
 * ProductsController implements the CRUD actions for Product model.
 */
class ProductsController extends BaseController
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

     //   var_dump($dataProvider); die;

/*
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find(),
        ]);*/

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        $model->pdv = 17;
        $types = Type::find()->all();

        if ($model->load(Yii::$app->request->post())) {

            $current_user = $this->currentUser();
            $model->user_id = $current_user->id;
            $date = date("d.m.Y");

            $percent = (float)$model->pdv + 100;

            $devide = $percent / 100;
            $marza = ((( $model->mp_price / $devide ) / $model->price ) -1) * 100;
            $model->ruc = sprintf("%.3f", $marza);
            $model->sum_price_without_pdv = $model->price * $model->quantity;
            $model->sum_price_with_padv = $model->sum_price_without_pdv * ( (float)$model->pdv / 100 ) + $model->sum_price_without_pdv;
            $model->active = 1;
            $model->date = $date;
            $model->save();
            
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'types' => $types
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $current_user = $this->currentUser();
            $model->user_id = $current_user->id;

            $percent = (float)$model->pdv + 100;
            $devide = $percent / 100;

            $marza = ((( $model->mp_price / $devide ) / $model->price ) -1) * 100;
            $model->ruc = sprintf("%.3f", $marza);
            $model->sum_price_without_pdv = $model->price * $model->quantity;
            $model->sum_price_with_padv = $model->sum_price_without_pdv * ( (float)$model->pdv / 100 ) + $model->sum_price_without_pdv;
            $model->active = 1;    
            $model->save();

            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
