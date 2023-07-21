<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LeaderLang;

/**
 * LeaderLangSearch represents the model behind the search form about `common\models\LeaderLang`.
 */
class LeaderLangSearch extends LeaderLang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'lang', 'parent'], 'integer'],
            [['fio', 'work_day', 'resume', 'task', 'position'], 'safe'],
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
        $query = LeaderLang::find();

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
            'lang' => $this->lang,
            'parent' => $this->parent,
        ]);

        $query->andFilterWhere(['like', 'fio', $this->fio])
            ->andFilterWhere(['like', 'work_day', $this->work_day])
            ->andFilterWhere(['like', 'resume', $this->resume])
            ->andFilterWhere(['like', 'task', $this->task])
            ->andFilterWhere(['like', 'position', $this->task]);

        return $dataProvider;
    }
}
