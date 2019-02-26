<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Printer;

/**
 * PrinterSearch represents the model behind the search form of `app\models\Printer`.
 */
class PrinterSearch extends Printer {

    public $inventory_name;
    public $printer_model;
    public $cartridge_model;
    public $date;
    public $cartridgeInstalledModelName;
    

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'printer_model_id', 'inventory_name_id'], 'integer'],
            [['inventory_name', 'printer_model', 'cartridge_model', 'date', 'cartridgeInstalledModelName'], 'safe']
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
        $query = Printer::find();
        $query->joinWith(['inventoryNum'])
                ->joinWith(['printerModel'])
                ->joinWith(['cartridgeModel'])
                ->joinWith(['printerCartridgeInstalleds'])
                ->joinWith(['cartridgeInstalledModel mdl'])
        ;

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['inventory_name'] = [
            'asc' => ['inventory_name' => SORT_ASC],
            'desc' => ['inventory_name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['printer_model'] = [
            'asc' => ['printer_model' => SORT_ASC],
            'desc' => ['printer_model' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['cartridge_model'] = [
            'asc' => ['cartridge_model' => SORT_ASC],
            'desc' => ['cartridge_model' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['date'] = [
            'asc' => ['date' => SORT_ASC],
            'desc' => ['date' => SORT_DESC],
        ];
        
        $dataProvider->sort->attributes['cartridgeInstalledModelName'] = [
            'asc' => ['mdl.cartridge_model' => SORT_ASC],
            'desc' => ['mdl.cartridge_model' => SORT_DESC],
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
                    'printer_model_id' => $this->printer_model_id,
                    'inventory_name_id' => $this->inventory_name_id,
                ])
                ->andFilterWhere(['like', 'inventory_name', ($this->inventory_name)])
                ->andFilterWhere(['like', 'printer_model', ($this->printer_model)])
                ->andFilterWhere(['like', 'cartridge_model.cartridge_model', $this->cartridge_model])
                ->andFilterWhere(['like', 'date', $this->date])
                ->andFilterWhere(['like', 'mdl.cartridge_model', $this->cartridgeInstalledModelName])
                
                ;
        

        return $dataProvider;
    }

}
