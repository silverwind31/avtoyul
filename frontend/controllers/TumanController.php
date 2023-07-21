<?php


namespace frontend\controllers;


use common\components\Controller;
use common\models\Branch;

class TumanController extends Controller
{
    public function actionIndex($bulinma){

        $model = Branch::find()->where(['slug'=>$bulinma])->one();

        if(empty($model)){
            return $this->goHome();
        }

        $branches = Branch::find()->all();

        return $this->render('index',[
            'model' => $model,
            'branches' => $branches
        ]);

    }

    public function actionGetInfo($id){

        $model = Branch::findOne($id);
        if(empty($model)){
            return $this->goHome();
        }

        return $this->renderAjax('get-info',[
            'model' => $model
        ]);

    }
}