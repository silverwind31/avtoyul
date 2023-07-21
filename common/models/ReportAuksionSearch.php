<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ReportAuksion;

/**
 * ReportAuksionSearch represents the model behind the search form of `common\models\ReportAuksion`.
 */
class ReportAuksionSearch extends ReportAuksion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'xulosa_number', 'topshirish_number', 'report_id'], 'integer'],
            [['auksion_address', 'foydalanish_maqsadi', 'maydoni', 'auksion_loyihasi', 'xulosa_date', 'xulosa_mazmuni', 'rad_sababi', 'topshirish_sanasi', 'savdo_golibi','month'], 'safe'],
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
        $query = ReportAuksion::find();

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
            'xulosa_date' => $this->xulosa_date,
            'xulosa_number' => $this->xulosa_number,
            'topshirish_sanasi' => $this->topshirish_sanasi,
            'topshirish_number' => $this->topshirish_number,
            'report_id' => $this->report_id,
        ]);

        $query->andFilterWhere(['like', 'auksion_address', $this->auksion_address])
            ->andFilterWhere(['like', 'foydalanish_maqsadi', $this->foydalanish_maqsadi])
            ->andFilterWhere(['like', 'maydoni', $this->maydoni])
            ->andFilterWhere(['like', 'auksion_loyihasi', $this->auksion_loyihasi])
            ->andFilterWhere(['like', 'xulosa_mazmuni', $this->xulosa_mazmuni])
            ->andFilterWhere(['like', 'rad_sababi', $this->rad_sababi])
            ->andFilterWhere(['like', 'savdo_golibi', $this->savdo_golibi]);

        return $dataProvider;
    }
}
