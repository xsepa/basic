<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LoadingReport;

/**
 * LoadingReportSearch represents the model behind the search form of `app\models\LoadingReport`.
 */
class LoadingReportSearch extends LoadingReport
{
    
    public $cartridge_id;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'loading_status_id'], 'integer'],
            [['date', 'loading_order_name', 'cartridge_id'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
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
    public function search($params)
    {
        $query = LoadingReport::find()
                ->joinWith('cartridgeLoadings')
                ;

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        //    'date' => $this->date,
            'user_id' => $this->user_id,
            'loading_status_id' => $this->loading_status_id,
        ]);

        $query->andFilterWhere(['like', 'loading_order_name', $this->loading_order_name]);
        $query->andFilterWhere(['like', 'date', $this->date]);
        

        return $dataProvider;
    }
}
