<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "printer_cartridge_installed".
 *
 * @property string $id
 * @property string $printer_id
 * @property string $cartridge_id
 * @property string $date
 *
 * @property Cartridge $cartridge
 * @property Printer $printer
 */
class PrinterCartridgeInstalled extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'printer_cartridge_installed';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['printer_id', 'cartridge_id', ], 'required'],
            [['printer_id', 'cartridge_id'], 'integer'],
            [['date'], 'safe'],
            [['cartridge_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cartridge::className(), 'targetAttribute' => ['cartridge_id' => 'id']],
            [['printer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Printer::className(), 'targetAttribute' => ['printer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'printer_id' => 'Printer ID',
            'cartridge_id' => 'Cartridge ID',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartridge() {
        return $this->hasOne(Cartridge::className(), ['id' => 'cartridge_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrinter() {
        return $this->hasOne(Printer::className(), ['id' => 'printer_id']);
    }

    /*
      public function getCompatibleCartridgeRelations(){
      return $this->hasMany(PrinterCartridgeCompatible::className(),['cartridge_model_id' => 'printer_model_id'])->via('printer');
      }

      public function getCompatibleCartridgeModels(){
      return $this->hasMany(CartridgeModel::classname(),['id' => 'cartridge_model_id'])->via('compatibleCartridgeRelations');
      }

      public function getCompatibleCartridges(){
      return $this->hasMany(Cartridge::className(),['cartridge_model_id' => 'id'])->via('compatibleCartridgeModels');
      }
     */

    public function getPrinterModel() {
        return $this->hasOne(PrinterModel::classname(), ['id' => 'printer_model_id'])->via('printer');
    }

    public function getCompatibles() {
        return $this->hasMany(PrinterCartridgeCompatible::classname(), ['printer_model_id' => 'id'])->via('printerModel');
    }
    
    public function getCompatibleCartridges(){
        return $this->hasMany(Cartridge::classname(),['cartridge_model_id'=>'cartridge_model_id'])->via('compatibles')
                ->where(['status_id' => CartridgeStatus::STATUS_FULL])
               
                ;
    }

    public function getArrayCompatibleCartridges(){
        $arCartridges = [];
        foreach ($this->compatibleCartridges as $cartridge){
            $arCartridges[$cartridge->id] = $cartridge->cartridge_model . " " . $cartridge->getInventory_name();
        }
        return $arCartridges;

    }    
    
    

    public function getArrayCompatibleCartridges__($id) {
        return ArrayHelper::map(Cartridge::find()
                                ->joinWith(['compatiblePrinters'])
                                ->where(['printer.id' => $id, 'status_id' => CartridgeStatus::STATUS_FULL])
                                ->all()
                        , 'id', 'inventory_name');
    }
    
    public function getArrayCompatibleCartridges_($id) {
        return ArrayHelper::map(Cartridge::find()
                                ->leftJoin(['compatiblePrinters'])
                                ->where(['printer.id' => $id, 'status_id' => CartridgeStatus::STATUS_FULL])
                                ->all()
                        , 'id', 'inventory_name');
    }

    
    
    

    public function getArrayPrintersWithPrinterModel($printer_id) {

        $arPrinters = [];
        if ($printer_id) {
            $printer = Printer::find()
                            ->where(['id' => $printer_id])->one();
            $arPrinters[$printer->id] = "вонзить сюда инвентарный номер " . $printer->getPrinter_model();
        } else {

            if ($printers = Printer::find()->select(['printer.id', 'printer_model_id'])->distinct()
                    ->leftJoin('order', 'order.printer_id = printer.id')
                    ->andWhere(['or',['order_status_id' => OrderStatus::ORDERSTATUS_CLOSED],['order_status_id' => null]])
                    ->all()) {
                foreach ($printers as $printer) {
                    $arPrinters[$printer->id] = "вонзить сюда инвентарный номер " . $printer->getPrinter_model();
                }
            }
        }
        return ($arPrinters);
    }
    
    
    public function getArrayAllCartridges(){
         return ArrayHelper::map(Cartridge::find()->asArray()->all(),'cartridge_id','inventarnii_nomer');
    }
    

    /**
     * {@inheritdoc}
     * @return PrinterCartridgeInstalledQuery the active query used by this AR class.
     */
    public static function find() {
        return new PrinterCartridgeInstalledQuery(get_called_class());
    }
    
    public function updateCrtridgeStatusAfterInstall(){
        Cartridge::find()->where(['id' => $this->cartridge_id])->one()->setCartridgeStatus(CartridgeStatus::STATUS_INSTALLED);
        return true;
    }
    
     public function updateCrtridgeStatusBeforeInstall(){
        //тут не $this->cartridge_id, тут предидущий картридж ид
        //поменял логику криэйта, теперь это в апдэйт и тогда с ид будет норм или нет :) 
        Cartridge::find()->where(['id' => $this->cartridge_id])->one()->setCartridgeStatus(CartridgeStatus::STATUS_EMPTY);
        return true;
    }
    
    public function setDate(){
        $this->date = date("Y-m-d");   
        return true;
    }

}
