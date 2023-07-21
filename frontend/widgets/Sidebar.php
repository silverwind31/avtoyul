<?php


namespace frontend\widgets;


use common\models\NewsCategory;
use common\models\SearchForm;
use yii\base\Widget;

class Sidebar extends Widget
{
    public function run()
    {
        $search = new SearchForm();
        $categories = NewsCategory::find()->where(['status'=>1])->all();
        $models = \common\models\News::find()->where(['status'=>1])->orderBy(['event_date'=>SORT_DESC])->limit(4)->all();
        return $this->render('sidebar', [
            'models'     => $models,
            'categories' => $categories,
            'search' => $search
        ]);
    }
}