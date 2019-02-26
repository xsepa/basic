<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Order;

/**
 * OrderSearch represents the model behind the search form of `app\models\Order`.
 */
class OrderSearch extends Order {

    public $username;
    public $orderStatusName;
    public $printerFullname;
    public $cartridgeFullname;
    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'cartridge_id', 'user_id', 'printer_id', 'order_status_id'], 'integer'],
            [['date', 'username', 'orderStatusName', 'printerFullname', 'cartridgeFullname'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query = Order::find();
        $query->joinWith(['user'])
                ->joinWith(['orderStatus orderStatusName'])
                ->joinWith(['printerModel'])
                ->joinWith(['cartridgeModel']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        
        $dataProvider->sort->attributes['username'] = [
            'asc' => ['username' => SORT_ASC],
            'desc' => ['username' => SORT_DESC],
        ];  

        $dataProvider->sort->attributes['orderStatusName'] = [
            'asc' => ['orderStatusName' => SORT_ASC],
            'desc' => ['orderStatusName' => SORT_DESC],
        ];  
        
        $dataProvider->sort->attributes['printerFullname'] = [
            'asc' => ['printer_model' => SORT_ASC],
            'desc' => ['printer_model' => SORT_DESC],
        ];
        
        $dataProvider->sort->attributes['cartridgeFullname'] = [
            'asc' => ['cartridge_model' => SORT_ASC],
            'desc' => ['cartridge_model' => SORT_DESC],
        ];
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'cartridge_id' => $this->cartridge_id,
            'date' => $this->date,
            'user_id' => $this->user_id,
            'printer_id' => $this->printer_id,
            'order_status_id' => $this->order_status_id,
            'orderStatusName' => $this->orderStatusName,
        ])
                ->andFilterWhere(['like', 'username', ($this->username)])
                ->andFilterWhere(['like', 'printer_model', ($this->printerFullname)])
                ->andFilterWhere(['like', 'cartridge_model', ($this->cartridgeFullname)])
                ;

        return $dataProvider;
    }

}
