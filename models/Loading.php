<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "loading".
 *
 * @property string $id
 * @property string $date
 * @property string $user_id
 * @property string $loading_order_name
 * @property string $loading_status_id
 *
 * @property CartridgeLoading[] $cartridgeLoadings
 * @property LoadingStatus $loadingStatus
 * @property User $user
 */
class Loading extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'loading';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['date'], 'safe'],
            [['user_id', 'loading_order_name', 'loading_status_id'], 'required'],
            [['user_id', 'loading_status_id'], 'integer'],
            [['loading_order_name'], 'string', 'max' => 45],
            [['loading_order_name'], 'unique'],
            [['loading_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => LoadingStatus::className(), 'targetAttribute' => ['loading_status_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'user_id' => 'User ID',
            'loading_order_name' => 'Loading Order Name',
            'loading_status_id' => 'Loading Status ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartridgeLoadings() {
        return $this->hasMany(CartridgeLoading::className(), ['loading_id' => 'id']);
    }

    public function getEmptyCartridges() {
        $arCartridges = [];

        $arCartridges = Cartridge::find()
                ->where(['status_id' => CartridgeStatus::STATUS_EMPTY])
                ->all();
        return (count($arCartridges) > 0) ? $arCartridges : false;
    }

    public function addCartridgeLoading($cartridge, $loading_id) {
        $cartridgeLoading = new CartridgeLoading();
        $cartridgeLoading->cartridge_id = $cartridge->id;
        $cartridgeLoading->loading_id = $loading_id;
        $cartridgeLoading->save();
        $cartridge->setCartridgeStatus(CartridgeStatus::STATUS_RELOADING);
    }

    public function createCartridgeLoadings() {
        $arCartridges = [];
        if ($arCartridges = $this->getEmptyCartridges()) {
            foreach ($arCartridges as $cartridge) {
                $this->addCartridgeLoading($cartridge, $this->id);
            }
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoadingStatus() {
        return $this->hasOne(LoadingStatus::className(), ['id' => 'loading_status_id']);
    }
    
    public function getLoadingStatusName(){
        return $this->loadingStatus->loading_status;
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
     * {@inheritdoc}
     * @return LoadingQuery the active query used by this AR class.
     */
    public static function find() {
        return new LoadingQuery(get_called_class());
    }

}
