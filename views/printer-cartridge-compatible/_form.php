<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\PrinterCartridgeCompatible */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="printer-cartridge-compatible-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cartridge_model_id')->dropDownList($model->getArrayCatridgeModels()) ?>

    <?= $form->field($model, 'printer_model_id')->dropDownList($model->getArrayPrinterModels()) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
