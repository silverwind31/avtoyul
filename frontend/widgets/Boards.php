<?php


namespace frontend\widgets;


use common\models\Branch;
use yii\base\Widget;

class Boards extends Widget
{
    public function run()
    {
        $model = Branch::findOne(['id' => 14]);

        return $this->render('boards',[
            'model' => $model
        ]);
    }
}