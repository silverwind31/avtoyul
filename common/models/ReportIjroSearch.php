<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ReportIjro;

/**
 * ReportIjroSearch represents the model behind the search form of `common\models\ReportIjro`.
 */
class ReportIjroSearch extends ReportIjro
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'deadline', 'report_id'], 'integer'],
            [['send_date', 'send_number', 'report_name', 'responsible_man', 'position', 'execution_state','month'], 'safe'],
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
        $query = ReportIjro::find();

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
            'send_date' => $this->send_date,
            'deadline' => $this->deadline,
            'report_id' => $this->report_id,
        ]);

        $query->andFilterWhere(['like', 'send_number', $this->send_number])
            ->andFilterWhere(['like', 'report_name', $this->report_name])
            ->andFilterWhere(['like', 'responsible_man', $this->responsible_man])
            ->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'execution_state', $this->execution_state]);

        return $dataProvider;
    }
}
