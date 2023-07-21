<?php

namespace frontend\widgets;

use yii\base\Widget;

class News extends Widget
{
    public function run()
    {
        $models = \common\models\News::find()->where(['status'=>1])->orderBy(['event_date'=>SORT_DESC])->limit(9)->all();
        return $this->render('news', [
            'models' => $models
        ]);
    }
}