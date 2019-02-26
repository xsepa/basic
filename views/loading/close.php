<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Loading */

$this->title = 'Close Loading: ' . $model->id . " " . $model->loading_order_name . " / " . $model->date;
$this->params['breadcrumbs'][] = ['label' => 'Loadings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Close';
?>
<div class="loading-update">

    <h1><?= Html::encode($this->title) ?></h1>
<?php if (count($cartridgeloadings)!=0) :?>
    <div class="loading-form">
        <?php $form = ActiveForm::begin(); ?>

        
        
        <?php foreach ($cartridgeloadings as $cartridgeLoading) : ?>
            <?= $form->field($cartridgeLoading, 'loading_price',  [
                        'model' => $cartridgeLoading,
                        'labelOptions' => ['class' => 'control-label'],
                        'inputOptions' => [
                            'id' => 'cartridge_loading_'.$cartridgeLoading->id,
                            'class' => 'form-control',
                            'name' => 'cartridgeLoading'.'['.$cartridgeLoading->id.']'
                        ],
            ])->textInput(['maxlength' => true])->label("price for " . $cartridgeLoading->cartridgeModelName . " " . $cartridgeLoading->cartridgeInventoryName) ?>

<?php
endforeach;


// var_dump($cartridgeLoadings);
?>
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
 <?php else: ?>
    
    <p>no cartridges found</p>
    
    <?php endif;?>
    
</div>


