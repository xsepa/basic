<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PrinterCartridgeCompatible */

$this->title = 'Update Printer Cartridge Compatible: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Printer Cartridge Compatibles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="printer-cartridge-compatible-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
