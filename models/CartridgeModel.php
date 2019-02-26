<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cartridge_model".
 *
 * @property string $id
 * @property string $cartridge_model
 *
 * @property Cartridge[] $cartridges
 * @property PrinterCartridgeCompatible[] $printerCartridgeCompatibles
 */
class CartridgeModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cartridge_model';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cartridge_model'], 'required'],
            [['cartridge_model'], 'string', 'max' => 255],
            [['cartridge_model'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cartridge_model' => 'Cartridge Model',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartridges()
    {
        return $this->hasMany(Cartridge::className(), ['cartridge_model_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrinterCartridgeCompatibles()
    {
        return $this->hasMany(PrinterCartridgeCompatible::className(), ['cartridge_model_id' => 'id']);
    }
}
