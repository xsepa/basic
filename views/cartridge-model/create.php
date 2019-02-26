<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CartridgeModel */

$this->title = 'Create Cartridge Model';
$this->params['breadcrumbs'][] = ['label' => 'Cartridge Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cartridge-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
