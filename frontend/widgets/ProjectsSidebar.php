<?php


namespace frontend\widgets;


use common\models\NewsCategory;
use common\models\ProjectCategory;
use common\models\SearchForm;
use yii\base\Widget;

class ProjectsSidebar extends Widget
{
    public function run()
    {
        $search = new SearchForm();
        $categories = ProjectCategory::find()->where(['status'=>1])->all();
        $models = \common\models\Project::find()->where(['status'=>1])->orderBy(['created_date'=>SORT_DESC])->limit(3)->all();
        return $this->render('projects-sidebar', [
            'models'     => $models,
            'categories' => $categories,
            'search' => $search
        ]);
    }
}