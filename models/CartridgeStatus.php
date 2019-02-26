<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cartridge_status".
 *
 * @property string $id
 * @property string $status
 *
 * @property Cartridge[] $cartridges
 */
class CartridgeStatus extends \yii\db\ActiveRecord
{
    CONST STATUS_FULL = 1;
    CONST STATUS_INSTALLED = 2;
    CONST STATUS_EMPTY = 3;
    CONST STATUS_RELOADING = 4;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cartridge_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'required'],
            [['status'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartridges()
    {
        return $this->hasMany(Cartridge::className(), ['status_id' => 'id']);
    }
}
