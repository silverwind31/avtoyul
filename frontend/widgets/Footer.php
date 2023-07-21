<?php

namespace frontend\widgets;

use yii\base\Widget;
use common\models\Menu;

class Footer extends Widget {

    public function run()
    {
//        $models = Menu::find()->where('status=1')->andWhere(['parent' => NULL,'type' => Menu::FOOTER])->orderBy(['order_by' => SORT_ASC])->all();
        $models = Menu::find()->where( 'parent=12')->andWhere(['type' => Menu::HEADER])->orderBy(['order_by' => SORT_ASC])->all();
        return $this->render('footer', [
            'models' => $models
        ]);
    }

}
