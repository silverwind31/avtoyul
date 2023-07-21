<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ReportMurojat;

/**
 * ReportMurojatSearch represents the model behind the search form of `common\models\ReportMurojat`.
 */
class ReportMurojatSearch extends ReportMurojat
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'report_id'], 'integer'],
            [['xudud_nomi', 'murojat_fish', 'murojat_date', 'qabul_qilish_date', 'rad_qilish_date', 'rad_sabablari','month'], 'safe'],
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
        $query = ReportMurojat::find();

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
            'murojat_date' => $this->murojat_date,
            'qabul_qilish_date' => $this->qabul_qilish_date,
            'rad_qilish_date' => $this->rad_qilish_date,
            'report_id' => $this->report_id,
        ]);

        $query->andFilterWhere(['like', 'xudud_nomi', $this->xudud_nomi])
            ->andFilterWhere(['like', 'murojat_fish', $this->murojat_fish])
            ->andFilterWhere(['like', 'rad_sabablari', $this->rad_sabablari]);

        return $dataProvider;
    }
}
