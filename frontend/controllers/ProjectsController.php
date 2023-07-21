<?php

namespace frontend\controllers;

use common\components\Controller;
use common\models\News;
use common\models\NewsCategory;
use common\models\NewsLang;
use common\models\Languages;
use common\models\Project;
use common\models\ProjectCategory;
use Yii;
use yii\data\ActiveDataProvider;

class ProjectsController extends Controller {

    public function actionView($id) {

        $model = Project::findOne($id);

        if( $model )
        {
//            $model->seen_count ++;
            $model->save();

            return $this->render('view', [
                'model' => $model
            ]);
        }

        return $this->referrer();

    }

    public function actionByCat($id)
    {

        if($category = ProjectCategory::findOne($id))
        {
            $models = Project::find()->where( 'status=1 AND category=' . $id )->orderBy(['created_date' => SORT_DESC]);

            $pagination = new \yii\data\Pagination([
                'totalCount' => $models->count(),
                'pageSize' => 6,
            ]);

            $models = $models->offset($pagination->offset)->limit($pagination->pageSize)->all();

            return $this->render('by-cat', [
                'category' => $category,
                'models' => $models,
                'pagination' => $pagination
            ]);

        }

        return $this->referrer();

    }

    public function actionViewAll() {

        $models = Project::find()->where('status=1')->orderBy(['created_date' => SORT_DESC]);

        $pagination = new \yii\data\Pagination([
            'totalCount' => $models->count(),
            'pageSize' => 9,
        ]);

        $models = $models->offset($pagination->offset)->limit($pagination->pageSize)->all();

        return $this->render('view-all', [
            'models' => $models,
            'pagination' => $pagination
        ]);
    }

    public function actionPrint($id) {

        if($model = News::findOne($id))
        {
            $this->layout = 'print';

            return $this->render('print',[
                'model' => $model
            ]);
        }

        return $this->referrer();
    }

}
