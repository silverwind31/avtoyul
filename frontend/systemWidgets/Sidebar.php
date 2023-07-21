<?php


namespace frontend\systemWidgets;


use common\models\SiteUser;
use Yii;
use yii\base\Widget;

class Sidebar extends Widget
{
    public function run(){
        $user = SiteUser::findOne(Yii::$app->user->getId());
        return $this->render('sidebar',[
            'user' => $user
        ]);
    }
}