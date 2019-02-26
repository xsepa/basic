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
class LoadingReport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'loading';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
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
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'user_id' => 'User ID',
            'loading_order_name' => 'Loading Order Name',
            'loading_status_id' => 'Loading Status ID',
        ];
    }

    
    public function getMonths(){
        
        //SELECT distinct DATE_FORMAT(date,'%Y-%m') FROM basic_test.loading;
         //$subquery = (new \yii\db\Query())->select('printer_id')->from('order')->where('order_status_id = 1');
        $query = (new \yii\db\Query())->select(["DATE_FORMAT(date,'%Y-%m') as date"])->distinct()->from('loading')->all();
     /*   echo('<pre>');
        var_dump($query);
        die();*/
        return (new \yii\db\Query())->select(["DATE_FORMAT(date,'%Y-%m') as date"])->distinct()->from('loading')->all();
        
        
    }
    
    
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartridgeLoadings()
    {
        return $this->hasMany(CartridgeLoading::className(), ['loading_id' => 'id']);
    }

    public function getCartridges(){
        
        $cartridges_array = [];
        //foreach ($this->cartridgeModel->printerCartridgeCompatibles as $key => $item) {
        foreach ($this->cartridgeLoadings as $key => $item) {
            array_push($cartridges_array, $item->cartridge->cartridge_model . $item->cartridge->inventory_name);
        }
        sort($cartridges_array);
        return implode(array_unique($cartridges_array, SORT_STRING), ", ");
        
    }
    
    public function getSumma(){
        $summ = 0 ;
        foreach ($this->cartridgeLoadings as $key => $item) {
            $summ += $item->loadingPrice;
        }
        return $summ;
    }
    
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoadingStatus()
    {
        return $this->hasOne(LoadingStatus::className(), ['id' => 'loading_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return LoadingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LoadingQuery(get_called_class());
    }
}
