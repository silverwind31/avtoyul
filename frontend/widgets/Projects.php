<?php


namespace frontend\widgets;


use yii\base\Widget;

class Projects extends Widget
{
    public function run()
    {
        $models = \common\models\Project::find()->where(['status'=>1])->orderBy(['created_date'=>SORT_DESC])->limit(6)->all();

        return $this->render('projects', [
            'models' => $models
        ]);
    }
}