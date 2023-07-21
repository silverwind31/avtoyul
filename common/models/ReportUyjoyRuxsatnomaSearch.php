<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ReportUyjoyRuxsatnoma;

/**
 * ReportUyjoyRuxsatnomaSearch represents the model behind the search form of `common\models\ReportUyjoyRuxsatnoma`.
 */
class ReportUyjoyRuxsatnomaSearch extends ReportUyjoyRuxsatnoma
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'xulosa_number', 'report_id'], 'integer'],
            [['hudud_name', 'ruxsatnoma_fish', 'ruxsatnoma_date', 'xulosa_date', 'natija_ijobiy', 'natija_rad', 'rad_sababi','month','user_id'], 'safe'],
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
        $query = ReportUyjoyRuxsatnoma::find();

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
            'ruxsatnoma_date' => $this->ruxsatnoma_date,
            'xulosa_date' => $this->xulosa_date,
            'xulosa_number' => $this->xulosa_number,
            'report_id' => $this->report_id,
        ]);

        $query->andFilterWhere(['like', 'hudud_name', $this->hudud_name])
            ->andFilterWhere(['like', 'ruxsatnoma_fish', $this->ruxsatnoma_fish])
            ->andFilterWhere(['like', 'natija_ijobiy', $this->natija_ijobiy])
            ->andFilterWhere(['like', 'natija_rad', $this->natija_rad])
            ->andFilterWhere(['like', 'rad_sababi', $this->rad_sababi]);

        return $dataProvider;
    }
}
