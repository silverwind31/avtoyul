<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BranchLang;

/**
 * BranchLangSearch represents the model behind the search form about `common\models\BranchLang`.
 */
class BranchLangSearch extends BranchLang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'lang', 'parent'], 'integer'],
            [['title', 'leader', 'address', 'leader_info'], 'safe'],
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
        $query = BranchLang::find();

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

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'leader', $this->leader])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'leader_info', $this->leader_info]);

        return $dataProvider;
    }
}
