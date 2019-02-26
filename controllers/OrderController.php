<?php

namespace app\controllers;

use Yii;
use app\models\Order;
use app\models\OrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\OrderStatus;
use \app\models\CartridgeStatus;
use \app\models\Cartridge;
use \app\models\PrinterCartridgeInstalled;
use yii\filters\AccessControl;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller {

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
                            'actions' => ['index', 'view', 'delete', 'update', 'close'],
                            'roles' => ['admin'],
                            
                        ],
                ],
                
            ],
        ];
    }

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex() {
        
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
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
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Order();

        if ($model->load(Yii::$app->request->post()) &&
                ($model->setDate()) &&
                ($model->setUserId()) &&
                ($model->setCartridgeId()) &&
                ($model->setStatus(OrderStatus::ORDERSTATUS_OPEN)) &&
                ($model->save())) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Order model.
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
        $oldCartridge = new Cartridge();
        if (($model->cartridge_id) && ($oldCartridge = Cartridge::find()->where(['id' => $model->cartridge_id])->one())) {
            $oldCartridge->setCartridgeStatus(CartridgeStatus::STATUS_EMPTY);
        }
        if ($model->load(Yii::$app->request->post()) && ($model->order_status_id = OrderStatus::ORDERSTATUS_CLOSED) && $model->save()) {

            //не протупить здесь уже другой картридж id загруженный из поста
            $newCartridge = Cartridge::find()->where(['id' => $model->cartridge_id])->one();
            $newCartridge->setCartridgeStatus(CartridgeStatus::STATUS_INSTALLED);

            if ($printerCartridgeInstalled = PrinterCartridgeInstalled::find()->where(['printer_id' => $model->printer_id])->one()) {
                $printerCartridgeInstalled->cartridge_id = $newCartridge->id;
                $printerCartridgeInstalled->date = date("Y-m-d");
                $printerCartridgeInstalled->save();
            } else {
                $printerCartridgeInstalled = new PrinterCartridgeInstalled();
                $printerCartridgeInstalled->cartridge_id = $newCartridge->id;
                $printerCartridgeInstalled->date = date("Y-m-d");
                $printerCartridgeInstalled->printer_id = $model->printer_id;
                $printerCartridgeInstalled->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('close', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Order model.
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
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
