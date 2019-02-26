<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "order".
 *
 * @property string $id
 * @property string $cartridge_id
 * @property string $date
 * @property string $user_id
 * @property string $printer_id
 * @property string $status_zayavok_id
 *
 * @property Printer $printer
 * @property OrderStatus $statusZayavok
 * @property User $user
 * @property Cartridge $cartridge
 */
class Order extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            // [['cartridge_id', 'date', 'user_id', 'printer_id', 'order_status_id'], 'safe'],
            [['printer_id'], 'required'],
            [['cartridge_id', 'user_id', 'printer_id', 'order_status_id'], 'integer'],
            [['date'], 'safe'],
            [['printer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Printer::className(), 'targetAttribute' => ['printer_id' => 'id']],
            [['order_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrderStatus::className(), 'targetAttribute' => ['order_status_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['cartridge_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cartridge::className(), 'targetAttribute' => ['cartridge_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'cartridge_id' => 'Cartridge ID',
            'date' => 'Date',
            'user_id' => 'User ID',
            'printer_id' => 'Printer ID',
            'order_status_id' => 'Status Zayavok ID',
        ];
    }

    public function getArrayPrintersWithPrinterModelForOrder($printer_id) {

        $arPrinters = [];

        if ($printer_id) {
            $printer = Printer::find()
                            ->where(['id' => $printer_id])->one();
            $arPrinters[$printer->id] = $printer->getPrinter_model() ." " . $printer->getInventory_name();
        } else {
            
            $subquery = (new \yii\db\Query())->select('printer_id')->from('order')->where('order_status_id = 1');
            $printers = Printer::find()->distinct()
                    ->leftJoin(['t1' => $subquery], 't1.printer_id = printer.id')
                    ->where( ['t1.printer_id' => null])
                    ->all();
            if ($printers){
                foreach ($printers as $printer) {
                    $arPrinters[$printer->id] = $printer->getPrinter_model() ." " . $printer->getInventory_name();
                }
            }
        }
        return ($arPrinters);
    }

    public function getCompatibles(){
        return $this->hasMany(PrinterCartridgeCompatible::classname(), ['printer_model_id' => 'id'])->via('printerModel');
    }
    
    public function getCompatibleCartridges(){
        return $this->hasMany(Cartridge::classname(),['cartridge_model_id'=>'cartridge_model_id'])->via('compatibles')->where(['status_id' => CartridgeStatus::STATUS_FULL]);
    }

    public function getArrayCompatibleCartridges(){
        $arCartridges = [];
        foreach ($this->compatibleCartridges as $cartridge){
            $arCartridges[$cartridge->id] = $cartridge->cartridge_model . " " . $cartridge->getInventory_name();
        }
        return $arCartridges;
    }
    
    public function setStatus($status_id) {
        $this->order_status_id = $status_id;
        return true;
    }

    public function setUserId() {
        $this->user_id = Yii::$app->user->id;
        return true;
    }

    public function setDate() {
        $this->date = date("Y-m-d");
        return true;
    }

    public function setCartridgeId() {
        $this->cartridge_id = $this->getInstalledCartridgeId();
        return true;
    }

    public function getPrinterCartridgeInstalleds() {
        return $this->hasOne(PrinterCartridgeInstalled::classname(), ['printer_id' => 'printer_id']);
    }

    public function getInstalledCartridge() {
        return $this->hasOne(Cartridge::classname(), ['id' => 'cartridge_id'])->via('printerCartridgeInstalleds');
    }

    public function getInstalledCartridgeId() {
        if ($this->installedCartridge) {
            return $this->installedCartridge->id;
        } else
            return "";
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrinter() {
        return $this->hasOne(Printer::className(), ['id' => 'printer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderStatus() {
        return $this->hasOne(OrderStatus::className(), ['id' => 'order_status_id']);
    }

    public function getOrderStatusName() {
        return $this->orderStatus->status;
    }

    public function getInventory() {
        return $this->hasOne(Inventory::classname(), ['id' => 'inventory_name_id'])->via('printer');
    }

    public function getInventoryName() {
        return $this->inventory->inventory_name;
    }

    public function getPrinterModel() {
        return $this->hasOne(PrinterModel::classname(), ['id' => 'printer_model_id'])->via('printer');
    }

    public function getPrinterModelName() {
        return $this->printerModel->printer_model;
    }

    public function getPrinterFullname() {

        return $this->inventoryName . " " . $this->getPrinterModelName();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getUsername() {
        return $this->user->username;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartridge() {
        return $this->hasOne(Cartridge::className(), ['id' => 'cartridge_id']);
    }
    
    public function getCartridgeModel(){
        return $this->hasOne(CartridgeModel::classname(), ['id' => 'cartridge_model_id'])->via('cartridge');
    }
    
    public function getCartridgeModelName(){
        if ($this->cartridgeModel){
        return $this->cartridgeModel->cartridge_model;
        }
    }
    
    public function getInventoryForCartridge(){
        return $this->hasOne(Inventory::classname(),['id' => 'inventory_name_id'])->via('cartridge');
    }
    
    public function getInventoryNameForCartridge(){
        if ($this->inventoryForCartridge){
        return $this->inventoryForCartridge->inventory_name;
        }
    }

    public function getCartridgeFullname(){
        return $this->getInventoryNameForCartridge() . " " . $this->getCartridgeModelName();
    }
    
    
    /**
     * {@inheritdoc}
     * @return OrderQuery the active query used by this AR class.
     */
    public static function find() {
        return new OrderQuery(get_called_class());
    }

}
