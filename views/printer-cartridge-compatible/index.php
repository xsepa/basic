<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Printer Cartridge Compatibles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="printer-cartridge-compatible-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Printer Cartridge Compatible', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'cartridge_model_id',
            'printer_model_id',
            [
                'attribute' => 'cartridge_model',
                'value' => function ($model) {
                    return $model->cartridgeModel->cartridge_model;
                },
            ],
            [
                'attribute' => 'printer_model',
                'value' => function ($model) {
                    return $model->printerModel->printer_model;
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
