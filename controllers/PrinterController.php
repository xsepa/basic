<?php

namespace app\controllers;

use Yii;
use app\models\Printer;
use app\models\PrinterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Inventory;
use yii\filters\AccessControl;

/**
 * PrinterController implements the CRUD actions for Printer model.
 */
class PrinterController extends Controller {

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
                        'actions' => ['index', 'view', 'delete', 'update', 'create'],
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Printer models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PrinterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Printer model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Printer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {

        $inventoryModel = new Inventory();
        $model = new Printer();
        if ($inventoryModel->load(Yii::$app->request->post()) && $inventoryModel->save()) {
            if (($model->load(Yii::$app->request->post())) && ($model->inventory_name_id = $inventoryModel->id) && ($model->save())) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
                    'model' => $model,
                    'inventoryModel' => $inventoryModel,
        ]);
    }

    /**
     * Updates an existing Printer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {


        $model = $this->findModel($id);

        $inventoryModel = Inventory::find()->where(['id' => $model->inventory_name_id])->one();

        if (!empty($inventoryModel)) {
            if ($inventoryModel->load(Yii::$app->request->post()) && $inventoryModel->save()) {
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
            return $this->render('update', [
                        'model' => $model,
                        'inventoryModel' => $inventoryModel,
            ]);
        } else {
            //@todo Обаработочку 
        }
    }

    /**
     * Deletes an existing Printer model.
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
     * Finds the Printer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Printer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Printer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
