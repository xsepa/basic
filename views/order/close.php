<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\PrinterCartridgeInstalled;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = 'Close Order: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Close';
?>
<div class="order-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (count($model->getArrayCompatibleCartridges($model->printer_id)) != 0): ?>
        <div class="order-form">
            <?php $form = ActiveForm::begin(); ?>




            <?= $form->field($model, 'cartridge_id')->dropDownList($model->getArrayCompatibleCartridges($model->printer_id)); ?>


            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>

    <?php else: ?>

    <?= Html::tag('p', 'Заправленных картриджей для данного принтера нет', ['class' => 'error']) ?>
    
    <?php 
   // Yii::$app->session->setFlash('error', 'Заправленных картриджей для данного принтера нет');
     
   // return Yii::$app->getResponse()->redirect(Url::to('/order/index')); ?>
    
    
    <?php
    endif;
    ?>

