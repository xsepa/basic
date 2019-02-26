<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PrinterCartridgeInstalled */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="printer-cartridge-installed-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php /*= $form->field($model, 'printer_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cartridge_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() */?>
    
        <?=
    $form->field($model, 'printer_id')->dropDownList($model->getArrayPrintersWithPrinterModel($model->printer_id),
            ['prompt' => 'Выбери Принтер',
                'onchange' => '
				$.post( "' . Yii::$app->urlManager->createUrl('printer-cartridge-installed/listcompatiblecartridges?id=') . '"+$(this).val(), 
                                    function( data ) {
                                            var itemsArray = JSON.parse(data);
                                            $("select[name*=cartridge_id]").empty();
                                            $.each(itemsArray, function(key, value) {
                                                $("select[name*=cartridge_id]").append($("<option value=" + key + ">" + value + "</option>"));
                                            });
				});
                            '
            ]
    );
    ?>

    <?= $form->field($model, 'cartridge_id')->dropDownList($model->getArrayAllCartridges(), ['cartridge_id' => 'inventarnii_nomer']) ?>
    
    
    
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
