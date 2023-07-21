<?php


namespace frontend\widgets;


use common\models\News;
use yii\base\Widget;

class Slider extends Widget
{
    public function run()
    {
        $models = News::find()->where(['status' => 1, 'slider' => 1])->limit(3)->orderBy(['event_date'=>SORT_DESC])->all();
        return $this->render('slider', [
            'models' => $models
        ]);
    }
}