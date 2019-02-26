<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventory".
 *
 * @property string $id
 * @property string $inventory_name
 *
 * @property Cartridge[] $cartridges
 * @property Printer[] $printers
 */
class Inventory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inventory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['inventory_name'], 'required'],
            [['inventory_name'], 'string', 'max' => 45],
            [['inventory_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'inventory_name' => 'Inventory Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartridges()
    {
        return $this->hasMany(Cartridge::className(), ['inventory_name_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrinters()
    {
        return $this->hasMany(Printer::className(), ['inventory_name_id' => 'id']);
    }
}
