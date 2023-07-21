<?php

namespace frontend\controllers;

use common\components\Controller;
use common\models\Document;
use common\models\DocumentCategory;
use common\models\News;
use common\models\NewsCategory;
use common\models\NewsLang;
use common\models\Languages;
use common\models\Project;
use common\models\ProjectCategory;
use Yii;
use yii\data\ActiveDataProvider;

class DocumentsController extends Controller {

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

        if($category = DocumentCategory::findOne($id))
        {

            $models = Document::find()->where( 'status=1 AND category=' . $id )->orderBy(['id' => SORT_DESC]);

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

        if(Yii::$app->language == Yii::$app->params['main_language'])
        {
            $models = Project::find()->where('status=1')->orderBy(['created_date' => SORT_DESC]);

        } else {

            $lang = Yii::$app->language;
            $id = Languages::find()->filterWhere(['abb' => $lang])->one()->id;
            $models = News::find()->leftJoin('project_lang', 'project.id=project_lang.parent')->where('project_lang.status=1 AND project_lang.lang=' . $id)->orderBy(['id' => SORT_DESC]);

        }

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
