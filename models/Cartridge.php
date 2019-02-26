<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\models\CartridgeModel;
use app\models\CartridgeStatus;
use app\models\Printer;

/**
 * This is the model class for table "cartridge".
 *
 * @property string $id
 * @property string $purchase_date
 * @property string $cartridge_model_id
 * @property string $status_id
 * @property string $inventory_name_id
 *
 * @property CartridgeModel $cartridgeModel
 * @property CartridgeStatus $status
 * @property Inventory $inventoryNum
 * @property CartridgeLoading[] $cartridgeLoadings
 * @property PrinterCartridgeInstalled[] $printerCartridgeInstalleds
 * @property Zayvka[] $zayvkas
 */
class Cartridge extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cartridge';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['purchase_date', 'cartridge_model_id', 'status_id', 'inventory_name_id'], 'required'],
            [['purchase_date'], 'safe'],
            [['cartridge_model_id', 'status_id', 'inventory_name_id'], 'integer'],
            [['cartridge_model_id'], 'exist', 'skipOnError' => true, 'targetClass' => CartridgeModel::className(), 'targetAttribute' => ['cartridge_model_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => CartridgeStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
            //[['inventory_name_id'], 'exist', 'skipOnError' => true, 'targetClass' => Inventory::className(), 'targetAttribute' => ['inventory_name_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'purchase_date' => 'Purchase Date',
            'cartridge_model_id' => 'Cartridge Model ID',
            'status_id' => 'Status ID',
            'inventory_name_id' => 'Inventory Num ID',
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    
    public function getCompatiblePrinterModels(){
        return $this->hasMany(PrinterCartridgeCompatible::className(), ['cartridge_model_id' => 'id']);
    }
    
    public function getCompatiblePrinters(){
        return $this->hasMany(Printer::className(), ['id' => 'printer_model_id'])->via('compatiblePrinterModels');
    }
    
    public function getCartridgeModel()
    {
        return $this->hasOne(CartridgeModel::className(), ['id' => 'cartridge_model_id']);
    }
    
    public function getPrinterCompatibles()
    {
        return $this->hasMany(PrinterCartridgeCompatible::className(), ['cartridge_model_id' => 'id'])->via('cartridgeModel');
    }
    
    public function getPrinterModel() 
    { 
        return $this->hasOne(PrinterModel::classname(), ['id' => 'printer_model_id'])->via('printerCompatibles');
    }
    
    
    public function getCartridge_model()
    {
        return $this->cartridgeModel->cartridge_model;
    }
    
    public function getPrinters(){
        
        $printers_array = [];
        //foreach ($this->cartridgeModel->printerCartridgeCompatibles as $key => $item) {
        foreach ($this->printerCompatibles as $key => $item) {
            array_push($printers_array, $item->printerModel->printer_model);
        }
        sort($printers_array);
        return implode(array_unique($printers_array, SORT_STRING), ", ");
        
    }
    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusTbl()
    {
        return $this->hasOne(CartridgeStatus::className(), ['id' => 'status_id']);
    }

    public function getStatus(){
        return $this->statusTbl->status;        
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    // неудачненько с именами получилось :) 
    public function getInventoryNum()
    {
        return $this->hasOne(Inventory::className(), ['id' => 'inventory_name_id']);
    }
    
    public function getInventory_name()
    {
        return $this->inventoryNum->inventory_name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartridgeLoadings()
    {
        return $this->hasMany(CartridgeLoading::className(), ['cartridge_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrinterCartridgeInstalleds()
    {
        //!! hasOne
        return $this->hasOne(PrinterCartridgeInstalled::className(), ['cartridge_id' => 'id']);
    }
    
    public function getPrinterInstalled(){
        return $this->hasOne(Printer::className(),['id' => 'printer_id'])->via('printerCartridgeInstalleds');
    }
    
    public function getPrinterInstalledModel(){
        
        return $this->hasOne(PrinterModel::className(), ['id' => 'printer_model_id'])->via('printerInstalled');
    }
    
    
    
    
    public function getPrinterInstalledModelName(){
        if ($this->printerInstalled){
            return $this->printerInstalled->printer_model  . " " . $this->printerInstalled->inventory_name  ;
        }
        else return "";
    }
    
    public function getDate(){
          if ($this->printerCartridgeInstalleds){
                return $this->printerCartridgeInstalleds->date;
          }
          else return "";
    }
    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZayvkas()
    {
        // hasONE !!
        return $this->hasOne(Zayvka::className(), ['cartridge_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CartridgeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CartridgeQuery(get_called_class());
    }
    
    public function getArrayCartridgeModels() 
    {
        return ArrayHelper::map(CartridgeModel::find()->all(), ['id'] , ['cartridge_model']);
    }
    
    public function getArrayCartridgeStatusList()
    {
       return ArrayHelper::map(CartridgeStatus::find()->all(), ['id'] , ['status']);
    }
    
    public function setCartridgeStatus($status){
        $this->status_id = $status; //CartridgeStatus::STATUS_INSTALLED;
        $this->update();
    }
    
}
