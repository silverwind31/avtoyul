<?php


namespace frontend\widgets;


use yii\base\Widget;

class InteractiveService extends Widget
{
    public function run()
    {
        $models = \common\models\PublicServices::find()->where(['status'=>1, 'category' => 2])->all();

        return $this->render('interactiveService', [

            'models' => $models

        ]);
    }
}