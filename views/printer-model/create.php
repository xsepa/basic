<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PrinterModel */

$this->title = 'Create Printer Model';
$this->params['breadcrumbs'][] = ['label' => 'Printer Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="printer-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
