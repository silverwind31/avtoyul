<?php


namespace frontend\widgets;


use yii\base\Widget;

class Partner extends Widget
{
    public function run()
    {
        $models = \common\models\Partner::find()->where('status=1')->all();
        return $this->render('partner', [
            'models' => $models
        ]);
    }
}