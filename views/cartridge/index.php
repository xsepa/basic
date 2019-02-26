<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CartridgeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cartridges';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cartridge-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
<?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
<?= Html::a('Create Cartridge', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //  'id',
            'purchase_date',
            // 'cartridge_model_id',
            'cartridge_model',
            //'status_id',
            //'status',
            [
                'label' => 'status',
                'attribute' => 'status',
                'value' => 'status',
                'filter' => Html::activeDropDownList($searchModel, 'status_id', ArrayHelper::map(app\models\CartridgeStatus::find()->asArray()->all(), 'id', 'status'), ['class' => 'form-control', 'prompt' => 'Select Category']),
            ],            
            
            //'inventory_name_id',
            'inventory_name',
            [
                'label' => 'printers',
                'attribute' => 'printer_model',
                'value' => function ($model, $key, $index) {
                    return $model->printers;
                },
            ],
            'printerInstalledModelName',
            'date',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
<?php Pjax::end(); ?>
</div>
