<?php


namespace frontend\widgets;


use yii\base\Widget;

class Service extends Widget
{

    public function run()
    {
        $models = \common\models\PublicServices::find()->where(['status'=>1, 'category' => 1])->all();

        return $this->render('service', [
            'models' => $models
        ]);
    }
}