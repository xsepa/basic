<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cartridge;

/**
 * CartridgeSearch represents the model behind the search form of `app\models\Cartridge`.
 */
class CartridgeSearch extends Cartridge {

    public $inventory_name;
    public $status;
    public $cartridge_model;
    public $printer_model;
    public $printerInstalledModelName;
    public $date;
    public $printers;

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'cartridge_model_id', 'status_id', 'inventory_name_id'], 'integer'],
            [['purchase_date', 'inventory_name', 'status', 'cartridge_model', 'printer_model', 'date', 'printerInstalledModelName', 'printers'], 'safe'],
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
        $query = Cartridge::find();
        $query->joinWith(['inventoryNum'])
                ->joinWith(['statusTbl'])
                ->joinWith(['cartridgeModel'])
                ->joinWith(['printerCompatibles'])
                ->joinWith(['printerModel'])
                ->joinWith(['printerCartridgeInstalleds'])
                ->joinWith(['printerInstalled'])
                ->joinWith(['printerInstalledModel mdl'])
        ;

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['inventory_name'] = [
            'asc' => ['inventory_name' => SORT_ASC],
            'desc' => ['inventory_name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['status'] = [
            'asc' => ['status' => SORT_ASC],
            'desc' => ['status' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['cartridge_model'] = [
            'asc' => ['cartridge_model' => SORT_ASC],
            'desc' => ['cartridge_model' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['printer_model'] = [
            'asc' => ['printer_model' => SORT_ASC],
            'desc' => ['printer_model' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['printerInstalledModelName'] = [
            'asc' => ['mdl.printer_model' => SORT_ASC],
            'desc' => ['mdl.printer_model' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['date'] = [
            'asc' => ['date' => SORT_ASC],
            'desc' => ['date' => SORT_DESC],
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
                    'cartridge_model_id' => $this->cartridge_model_id,
                    'status_id' => $this->status_id,
                    'inventory_name_id' => $this->inventory_name_id,
                ])
                ->andFilterWhere(['like', 'purchase_date', $this->purchase_date])
                ->andFilterWhere(['like', 'inventory_name', ($this->inventory_name)])
                ->andFilterWhere(['like', 'status', ($this->status)])
                ->andFilterWhere(['like', 'cartridge_model', ($this->cartridge_model)])
                ->andFilterWhere(['like', 'printer_model.printer_model', $this->printer_model])
                ->andFilterWhere(['like', 'date', $this->date])
                ->andFilterWhere(['like', 'mdl.printer_model', $this->printerInstalledModelName])
        ;
        

        return $dataProvider;
    }

}
