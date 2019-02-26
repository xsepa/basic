<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Loading;

/**
 * LoadingSearch represents the model behind the search form of `app\models\Loading`.
 */
class LoadingSearch extends Loading {

    public $loadingStatusName;
    public $username;

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'user_id', 'loading_status_id'], 'integer'],
            [['date', 'loading_order_name', 'loadingStatusName', 'username'], 'safe'],
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
        $query = Loading::find()
        ->joinwith('user');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['loadingStatusName'] = [
            'asc' => ['loading_status_id' => SORT_ASC],
            'desc' => ['loading_status_id' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['username'] = [
            'asc' => ['user_id' => SORT_ASC],
            'desc' => ['user_id' => SORT_DESC],
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
                    'date' => $this->date,
                    'user_id' => $this->user_id,
                    'loading_status_id' => $this->loading_status_id,
                ])
                ->andFilterWhere(['like', 'date', $this->date])

        ;

        $query->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }

}
