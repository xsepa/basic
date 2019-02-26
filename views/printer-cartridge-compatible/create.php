<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PrinterCartridgeCompatible */

$this->title = 'Create Printer Cartridge Compatible';
$this->params['breadcrumbs'][] = ['label' => 'Printer Cartridge Compatibles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="printer-cartridge-compatible-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
