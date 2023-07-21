<?php


namespace frontend\widgets;


use common\models\Album;
use yii\base\Widget;

class Gallery extends Widget
{
    public function run()
    {

        $models = \common\models\Image::find()->where(['status'=>1])->limit(6)->all();
            return $this->render('gallery', [
            'models'     => $models
        ]);
    }
}