<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PrinterCartridgeCompatible */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Printer Cartridge Compatibles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="printer-cartridge-compatible-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'cartridge_model_id',
            //'printer_model_id',
            [
                'attribute'=>'cartridge model',
                'value' => $model->cartridgeModel->cartridge_model,
            ],
            [
                'attribute'=>'printer model',
                'value' => $model->printerModel->printer_model,
            ]

        ],
    ])
    ?>

</div>
