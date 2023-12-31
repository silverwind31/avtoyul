<?php


namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Report;

/**
 * ReportSearch represents the model behind the search form about `common\models\Report`.
 */
class ReportSearch extends Report

{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'document_type', 'year', 'month', 'user_id', 'status'], 'integer'],
            [['created_date', 'closed_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Report::find();

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
            'document_type' => $this->document_type,
            'year' => $this->year,
            'month' => $this->month,
            'user_id' => $this->user_id,
            'status' => $this->status,
            'created_date' => $this->created_date,
            'closed_date' => $this->closed_date,
        ]);


        return $dataProvider;
    }
}
