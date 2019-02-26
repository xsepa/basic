<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "printer_cartridge_compatible".
 *
 * @property string $id
 * @property string $cartridge_model_id
 * @property string $printer_model_id
 *
 * @property CartridgeModel $cartridgeModel
 * @property PrinterModel $printerModel
 */
class PrinterCartridgeCompatible extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'printer_cartridge_compatible';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cartridge_model_id', 'printer_model_id'], 'required'],
            [['cartridge_model_id', 'printer_model_id'], 'integer'],
            [['cartridge_model_id'], 'exist', 'skipOnError' => true, 'targetClass' => CartridgeModel::className(), 'targetAttribute' => ['cartridge_model_id' => 'id']],
            [['printer_model_id'], 'exist', 'skipOnError' => true, 'targetClass' => PrinterModel::className(), 'targetAttribute' => ['printer_model_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cartridge_model_id' => 'Cartridge Model ID',
            'printer_model_id' => 'Printer Model ID',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartridgeModel()
    {
        return $this->hasOne(CartridgeModel::className(), ['id' => 'cartridge_model_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrinterModel()
    {
        return $this->hasOne(PrinterModel::className(), ['id' => 'printer_model_id']);
    }
    
    
    public function getArrayCatridgeModels(){
        return ArrayHelper::map(CartridgeModel::find()->all(), ['id'], ['cartridge_model']);
    }
    
    public function getArrayPrinterModels(){
        return ArrayHelper::map(PrinterModel::find()->all(), ['id'], ['printer_model']);
    }

    
    
    public function getCartridgeModelName(){
        return $this->cartridgemodel->cartridge_model;        
    }
    
}
