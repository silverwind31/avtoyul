<?php


namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ReportOffense;

/**
 * ReportOffenseSearch represents the model behind the search form about `common\models\ReportOffense`.
 */
class ReportOffenseSearch extends ReportOffense

{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'report_id', 'user_id'], 'integer'],
            [['building_owner', 'building_name', 'doc_number_date', 'tribunal_info', 'commission_xabarnoma', 'commission_davo', 'problem_solve', 'illegal_order', 'legal_order', 'created_date', 'update_date','month','user_id'], 'safe'],
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
        $query = ReportOffense::find();

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
            'report_id' => $this->report_id,
            'created_date' => $this->created_date,
            'update_date' => $this->update_date,
        ]);

        $query->andFilterWhere(['like', 'building_owner', $this->building_owner])
            ->andFilterWhere(['like', 'building_name', $this->building_name])
            ->andFilterWhere(['like', 'doc_number_date', $this->doc_number_date])
            ->andFilterWhere(['like', 'tribunal_info', $this->tribunal_info])
            ->andFilterWhere(['like', 'commission_xabarnoma', $this->commission_xabarnoma])
            ->andFilterWhere(['like', 'commission_davo', $this->commission_davo])
            ->andFilterWhere(['like', 'problem_solve', $this->problem_solve])
            ->andFilterWhere(['like', 'illegal_order', $this->illegal_order])
            ->andFilterWhere(['like', 'legal_order', $this->legal_order]);


        return $dataProvider;
    }
}
