<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Cartridge */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cartridge-form">

    <?php $form = ActiveForm::begin(); ?>

   <!-- <?php /* = $form->field($model, 'purchase_date')->textInput() ?>

    <?= $form->field($model, 'cartridge_model_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inventory_name_id')->textInput(['maxlength' => true]) */?>
    -->
    
    
    <?= $form->field($inventoryModel, 'inventory_name')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'purchase_date')->widget(
            DatePicker::className(), [
        // inline too, not bad
        'inline' => true,
        // modify template for custom rendering
        'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
    ?>

    <?= $form->field($model, 'cartridge_model_id')->dropDownList($model->getArrayCartridgeModels()); ?>

    <?= $form->field($model, 'status_id')->dropDownList($model->getArrayCartridgeStatusList());?>
    
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
