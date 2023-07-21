<?php


namespace frontend\widgets;


use common\models\DocumentCategory;
use common\models\NewsCategory;
use common\models\ProjectCategory;
use common\models\SearchForm;
use yii\base\Widget;

class DocumentsSidebar extends Widget
{
    public function run()
    {
//        $search = new SearchForm();
          $models = DocumentCategory::find()->where(['status'=>1])->all();
        return $this->render('documents-sidebar', [
            'models'     => $models,
//            'categories' => $categories,
//            'search' => $search
        ]);
    }
}