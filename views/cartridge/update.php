<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cartridge */

$this->title = 'Update Cartridge: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cartridges', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cartridge-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'inventoryModel' => $inventoryModel,
    ]) ?>

</div>
