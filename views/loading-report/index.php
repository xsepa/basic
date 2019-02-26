<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LoadingReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Loading Reports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loading-report-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a('Create Loading Report', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?php
    ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            //  'date',
            [
                'label' => 'date',
                'attribute' => 'date',
                'value' => 'date',
                'filter' => Html::activeDropDownList($searchModel, 'date', ArrayHelper::map(app\models\LoadingReport::getMonths(), 'date', 'date'), ['class' => 'form-control', 'prompt' => 'Select Category']),
            ],
            'user_id',
            'loading_order_name',
            'loading_status_id',
            // 'cartridgeLoadings',
            [
                'label' => 'cartridges',
                'attribute' => 'cartridge_id',
                'value' => function ($model, $key, $index) {
                    return $model->cartridges;
                },
            ],
            'summa',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>

    <?php
    $gridColumns = [
        'id',
        'date',
        'loading_order_name',
        [
            'label' => 'cartridges',
            'attribute' => 'cartridge_id',
            'value' => function ($model, $key, $index) {
                return $model->cartridges;
            },
        ],
        'summa',
    ];
    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns
    ]);
    ?>

</div>
