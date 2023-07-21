<?php


namespace frontend\systemWidgets;


use common\models\ReportSearch;
use common\models\SiteUser;
use Yii;
use yii\base\Widget;

class Main extends Widget
{
    public function run()
    {
        $searchModel = new ReportSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 20;

        $user = SiteUser::findOne(Yii::$app->user->getId());

        if($user->rank == 2){
            $dataProvider->query->where(['status' => [10,20]])->andWhere(['user_id'=>$user->id]);
        }else{
            $dataProvider->query->where(['status' => 30]);
        }

        return $this->render('main',[
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'user' => $user
        ]);
    }
}