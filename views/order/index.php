<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\OrderStatus;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            // 'cartridge_id',
            'date',
            // 'user_id',
            'username',
            // 'printer_id',
            //'order_status_id',
            //   'orderStatusName',
            [
                'label' => 'order status',
                'attribute' => 'order_status_id',
                'value' => 'orderStatusName',
                'filter' => Html::activeDropDownList($searchModel, 'order_status_id', ArrayHelper::map(app\models\OrderStatus::find()->asArray()->all(), 'id', 'status'), ['class' => 'form-control', 'prompt' => 'Select Category']),
            ],
            //'InventoryName',
            'printerFullname',
            'cartridgeFullname',
            [
                'class' => \yii\grid\ActionColumn::className(),
                'buttons' => [
                    'close' => function ($url, $model) {
                        if ($model->order_status_id == OrderStatus::ORDERSTATUS_OPEN) {

                            $customurl = Yii::$app->getUrlManager()->createUrl(['order/close', 'id' => $model['id']]);
                            return \yii\helpers\Html::a('<span class="glyphicon glyphicon-flag"></span>', $customurl,
                                            ['title' => Yii::t('yii', 'Close'), 'data-pjax' => '0']);
                        } else {
                            $customurl = '';
                            return \yii\helpers\Html::a('<span class="glyphicon glyphicon-ok"></span>', $customurl,
                                            ['title' => Yii::t('yii', 'Close'), 'data-pjax' => '0']);
                        }
                    }
                ],
                'template' => '{close}',
            ],
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
