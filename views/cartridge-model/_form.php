<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CartridgeModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cartridge-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cartridge_model')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
