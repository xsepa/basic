<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Loading */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loading-form">

    <?php $form = ActiveForm::begin(); ?>

  <?php /*  <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loading_order_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loading_status_id')->textInput(['maxlength' => true]) ?>
   * 
   * 
   */
?>
    
    <?= $form->field($model, 'loading_order_name')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
