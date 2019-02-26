<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CartridgeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cartridge-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'purchase_date') ?>

    <?= $form->field($model, 'cartridge_model_id') ?>

    <?= $form->field($model, 'status_id') ?>

    <?= $form->field($model, 'inventory_name_id') ?>
    
     <?= $form->field($model, 'printer_model') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
