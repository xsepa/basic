<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PrinterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Printers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="printer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a('Create Printer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            //    'printer_model_id',
            //    'inventory_name_id',
            'inventory_name',
            'printer_model',
            [
                'label' => 'compatible cartridges',
                'attribute' => 'cartridge_model',
                'value' => function ($model, $key, $index) {
                    return $model->cartridges;
                },
            ],
            'cartridgeInstalledModelName',
            'date',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
