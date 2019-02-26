<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\models\PrinterModel;

/**
 * This is the model class for table "printer".
 *
 * @property string $id
 * @property string $printer_model_id
 * @property string $inventory_name_id
 *
 * @property Inventory $inventoryName
 * @property PrinterModel $printerModel
 * @property PrinterCartridgeInstalled[] $printerCartridgeInstalleds
 * @property Zayvka[] $zayvkas
 */
class Printer extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'printer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['printer_model_id', 'inventory_name_id'], 'integer'],
            [['inventory_name_id'], 'required'],
            [['inventory_name_id'], 'exist', 'skipOnError' => true, 'targetClass' => Inventory::className(), 'targetAttribute' => ['inventory_name_id' => 'id']],
            [['printer_model_id'], 'exist', 'skipOnError' => true, 'targetClass' => PrinterModel::className(), 'targetAttribute' => ['printer_model_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'printer_model_id' => 'Printer Model ID',
            'inventory_name_id' => 'Inventory Name ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventoryName() {
        return $this->hasOne(Inventory::className(), ['id' => 'inventory_name_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrinterModel() {
        return $this->hasOne(PrinterModel::className(), ['id' => 'printer_model_id']);
    }

    public function getPrinter_model() {
        if ($this->printerModel) {
            return $this->printerModel->printer_model;
        }
    }

    public function getCartridgeCompatibles() {
        return $this->hasMany(PrinterCartridgeCompatible::className(), ['printer_model_id' => 'id'])->via('printerModel');
    }

    public function getCartridgeModel() {
        return $this->hasOne(CartridgeModel::classname(), ['id' => 'cartridge_model_id'])->via('cartridgeCompatibles');
    }

    public function getCartridges() {
        $cartrdge_array = [];
        foreach ($this->cartridgeCompatibles as $key => $item) {
            array_push($cartrdge_array, $item->cartridgeModel->cartridge_model);
        }
        sort($cartrdge_array);
        return implode(array_unique($cartrdge_array, SORT_STRING), ", ");
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrinterCartridgeInstalleds() {
        return $this->hasOne(PrinterCartridgeInstalled::className(), ['printer_id' => 'id']);
    }

    public function getCartridgeInstalled() {
        return $this->hasOne(Cartridge::classname(), ['id' => 'cartridge_id'])->via('printerCartridgeInstalleds');
    }

    public function getCartridgeInstalledModel() {
        return $this->hasOne(CartridgeModel::classname(), ['id' => 'cartridge_model_id'])->via('cartridgeInstalled');
    }

    public function getCartridgeInstalledModelName() {
        if ($this->cartridgeInstalled) {
            return $this->cartridgeInstalled->cartridge_model . " " . $this->cartridgeInstalled->inventory_name;
        } else
            return "";
    }

    public function getDate() {
        if ($this->printerCartridgeInstalleds) {
            return $this->printerCartridgeInstalleds->date;
        } else
            return "";
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZayvkas() {
        return $this->hasMany(Zayvka::className(), ['printer_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return PrinterQuery the active query used by this AR class.
     */
    public static function find() {
        return new PrinterQuery(get_called_class());
    }

    public function getArrayPrinterModels() {
        return ArrayHelper::map(PrinterModel::find()->all(), ['id'], ['printer_model']);
    }

    public function getInventoryNum() {
        return $this->hasOne(Inventory::className(), ['id' => 'inventory_name_id']);
    }

    public function getInventory_name() {
        return $this->inventoryNum->inventory_name;
    }

}
