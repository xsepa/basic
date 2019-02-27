<?php

namespace app\controllers;

use Yii;
use app\models\Loading;
use app\models\LoadingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\LoadingStatus;
use app\models\CartridgeLoading;
use app\models\Cartridge;
use app\models\CartridgeStatus;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;

/**
 * LoadingController implements the CRUD actions for Loading model.
 */
class LoadingController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::classname(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'delete', 'update', 'create', 'close'],
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Loading models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new LoadingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Loading model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {

        $dataProvider = new ActiveDataProvider([
            'query' => CartridgeLoading::find()->where(['loading_id' => $id])]);

        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'loadingDataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Loading model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Loading();

        if ($model->load(Yii::$app->request->post()) && ($model->date = date("Y-m-d")) && ($model->user_id = 1) && ($model->loading_status_id = LoadingStatus::LOADINGSTATUS_OPEN) && ($model->getEmptyCartridges()) && $model->save()) {

            $model->createCartridgeLoadings();

            return $this->redirect(['view', 'id' => $model->id]);
        } elseif (!$model->getEmptyCartridges()) {
            Yii::$app->session->setFlash('error', 'нет пустых карттриджей');
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Loading model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    public function actionClose($id) {
        $model = $this->findModel($id);
        $cartridgeLoadings = $model->cartridgeLoadings;

        if ((Yii::$app->request->post('cartridgeLoading')) && is_array(Yii::$app->request->post('cartridgeLoading'))) {
            echo('<pre>');
            foreach (Yii::$app->request->post('cartridgeLoading') as $loading_id => $price) {

                $cartrideLoading = CartridgeLoading::findOne($loading_id);
                if ($cartrideLoading) {
                    $cartridge = Cartridge::findOne($cartrideLoading->cartridge_id);
                    if ($cartridge) {
                        $cartridge->setCartridgeStatus(CartridgeStatus::STATUS_FULL);
                    }
                    $cartrideLoading->loading_price = $price;
                    $cartrideLoading->save();
                }


                var_dump($loading_id);
                var_dump($price);
            }
            $model->loading_status_id = LoadingStatus::LOADINGSTATUS_CLOSED;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('close', [
                    'model' => $model,
                    'cartridgeloadings' => $cartridgeLoadings,
        ]);
    }

    /**
     * Deletes an existing Loading model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Loading model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Loading the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Loading::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
