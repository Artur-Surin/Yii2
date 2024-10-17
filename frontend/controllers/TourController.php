<?php

namespace frontend\controllers;

use app\models\TourPrice;
use Yii;
use app\models\Tour;
use app\models\TourSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TourController implements the CRUD actions for Tours model.
 */
class TourController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Tours models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TourSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Tours model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tours model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $tourModel = new Tour();
        $priceModel = new TourPrice();

        if (Yii::$app->request->isPost) {

            $tourModel->load(Yii::$app->request->post());
            $priceModel->load(Yii::$app->request->post());

            if ($tourModel->validate() && $tourModel->save()) {

                $priceModel->tour_id = $tourModel->id;

                if ($priceModel->validate() && $priceModel->save()) {
                    return $this->redirect(['view', 'id' => $tourModel->id]);
                } else {
                    $tourModel->delete();
                }
            }
        }

        return $this->render('create', [
            'tourModel' => $tourModel,
            'priceModel' => $priceModel,
        ]);
    }

    /**
     * Updates an existing Tours model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $tourModel = $this->findModel($id);
        $priceModel = $tourModel->tourPrice ?: new TourPrice();

        if (Yii::$app->request->isPost) {
            $tourModel->load(Yii::$app->request->post());
            $priceModel->load(Yii::$app->request->post());

            if ($tourModel->validate() && $tourModel->save()) {
                $priceModel->tour_id = $tourModel->id;

                if ($priceModel->validate() && $priceModel->save()) {
                    return $this->redirect(['view', 'id' => $tourModel->id]);
                }
            }
        }

        return $this->render('update', [
            'tourModel' => $tourModel,
            'priceModel' => $priceModel,
        ]);
    }

    /**
     * Deletes an existing Tours model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tours model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Tour the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tour::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
