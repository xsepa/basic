<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PrinterCartridgeInstalled */

$this->title = 'Create Printer Cartridge Installed';
$this->params['breadcrumbs'][] = ['label' => 'Printer Cartridge Installeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="printer-cartridge-installed-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
