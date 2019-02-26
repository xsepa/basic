<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cartridge_loading".
 *
 * @property string $id
 * @property string $cartridge_id
 * @property string $loading_id
 * @property double $loading_price
 *
 * @property Cartridge $cartridge
 * @property Loading $loading
 */
class CartridgeLoading extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'cartridge_loading';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['cartridge_id', 'loading_id'], 'required'],
            [['cartridge_id', 'loading_id'], 'integer'],
            [['loading_price'], 'number'],
            [['cartridge_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cartridge::className(), 'targetAttribute' => ['cartridge_id' => 'id']],
            [['loading_id'], 'exist', 'skipOnError' => true, 'targetClass' => Loading::className(), 'targetAttribute' => ['loading_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'cartridge_id' => 'Cartridge ID',
            'loading_id' => 'Loading ID',
            'loading_price' => 'Loading Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartridge() {
        return $this->hasOne(Cartridge::className(), ['id' => 'cartridge_id']);
    }

    public function getCartridgeModel() {
        return $this->hasOne(CartridgeModel::classname(),['id' => 'cartridge_model_id'])->via('cartridge');
    }
    
    public function getCartridgeModelName() {
        return $this->cartridgeModel->cartridge_model;
    }
    
    public function getCartridgeInventory(){
        return $this->hasOne(Inventory::classname(),['id' => 'inventory_name_id'])->via('cartridge');
    }

    public function getCartridgeInventoryName(){
        return $this->cartridgeInventory->inventory_name;
        
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoading() {
        return $this->hasOne(Loading::className(), ['id' => 'loading_id']);
    }

    public function getLoadingPrice(){
        return $this->loading_price;
    }

    /**
     * {@inheritdoc}
     * @return CartridgeLoadingQuery the active query used by this AR class.
     */
    public static function find() {
        return new CartridgeLoadingQuery(get_called_class());
    }
    
    public function getCartridgeFuulName(){
        return $this->cartridgeModelName . " " . $this->cartridgeInventoryName;
        
    }

}
