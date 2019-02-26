<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Printer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="printer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php /*= $form->field($model, 'printer_model_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inventory_name_id')->textInput(['maxlength' => true]) */?>
    
    <?= $form->field($inventoryModel, 'inventory_name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'printer_model_id')->dropDownList($model->getArrayPrinterModels()); ?>

    
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
