<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "printer_model".
 *
 * @property string $id
 * @property string $printer_model
 *
 * @property Printer[] $printers
 * @property PrinterCartridgeCompatible[] $printerCartridgeCompatibles
 */
class PrinterModel extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'printer_model';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['printer_model'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'printer_model' => 'Printer Model',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrinters() {
        return $this->hasMany(Printer::className(), ['printer_model_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrinterCartridgeCompatibles() {
        return $this->hasMany(PrinterCartridgeCompatible::className(), ['printer_model_id' => 'id']);
    }

}
