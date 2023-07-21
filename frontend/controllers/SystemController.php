<?php


namespace frontend\controllers;


use common\components\Controller;
use common\components\Model;
use common\models\District;
use common\models\Report;
use common\models\ReportAuksion;
use common\models\ReportAuksionSearch;
use common\models\ReportFoydalanishgaQabulqilish;
use common\models\ReportFoydalanishgaQabulqilishSearch;
use common\models\ReportIjro;
use common\models\ReportIjroSearch;
use common\models\ReportMurojat;
use common\models\ReportMurojatSearch;
use common\models\ReportOffense;
use common\models\ReportOffenseSearch;
use common\models\ReportRuxsatnoma;
use common\models\ReportRuxsatnomaSearch;
use common\models\ReportSearch;
use common\models\ReportUyjoyRuxsatnoma;
use common\models\ReportUyjoyRuxsatnomaSearch;
use common\models\SiteUser;
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use yii\widgets\ActiveForm;

class SystemController extends Controller
{
    public $layout = 'admin';

    public function actionIndex(){

        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }

        return $this->render('index');
    }

    public function actionCreateReport(){

        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $user = SiteUser::findOne(Yii::$app->user->getId());

        if($user->getRank() != 1){
            return $this->goBack();
        }

        $model = new Report();


        if($model->load(Yii::$app->request->post())){

            $exists = Report::find()->where(['user_id'=>$model->user_id])->andWhere(['month'=>$model->month])->andWhere(['document_type'=>$model->document_type])->all();

            if(!empty($exists)){
                Yii::$app->session->setFlash('exists-error');
                return $this->referrer();
            }

            $everythingIsOk = false;

            foreach($model->document_type as $doc){

                foreach ($model->user_id as $user_id){

                    $report = new Report();
                    $report->setAttributes($model->attributes);
                    $report->user_id = $user_id;
                    $report->document_type = $doc;
                    $report->status = 10;

                    if($report->save()){
                        // do nothing
                        $everythingIsOk = true;
                    }else{
                        $everythingIsOk = false;
                        return print_r($report->errors);
                    }

                }
            }


            if($everythingIsOk){
                Yii::$app->session->setFlash('report-create-success');
                return $this->redirect('index');
            }

        }

        return $this->render('create-report',[
            'model' => $model
        ]);
    }

    public function actionFillReport($id){

        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $model = Report::findOne($id);
        $reportsData = ReportOffense::find()->where(['report_id'=>$id])->all();

        if($model->user_id != Yii::$app->user->getId() || $model->status > 20){
            return $this->goBack();
        }

        if($model->load(Yii::$app->request->post())){
//            print_r($_POST);die;
            $oldIDs = ArrayHelper::map($reportsData, 'id', 'id');
            $reportsData = Model::createMultiple(ReportOffense::classname(), $reportsData);
            Model::loadMultiple($reportsData, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($reportsData, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validateMultiple($reportsData);
            }

            // validate all models
            $valid = Model::validateMultiple($reportsData);

            if ($valid) {

                $transaction = \Yii::$app->db->beginTransaction();

                try {

                        $flag = false;

                        if (!empty($deletedIDs)) {
                            ReportOffense::deleteAll(['id' => $deletedIDs]);
                        }

                        foreach ($reportsData as $data) {
                            $data->report_id = $model->id;
                            if (! ($flag = $data->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }

                        if ($flag) {
                            $transaction->commit();
                            Yii::$app->session->setFlash('report-saved');
                            return $this->redirect(['system/index','id'=>$id]);
                        }

                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

        }

        $user = SiteUser::findOne(Yii::$app->user->id);
        return $this->render('fill-report',[
            'model' => $model,
            'user' => $user,
            'reportsData' => (empty($reportsData)) ? [new ReportOffense()] : $reportsData
        ]);
    }

    public function actionFillReportIjro($id){

        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $model = Report::findOne($id);
        $reportsData = ReportIjro::find()->where(['report_id'=>$id])->all();

        if($model->user_id != Yii::$app->user->getId() || $model->status > 20){
            return $this->goBack();
        }

        if($model->load(Yii::$app->request->post())){
//            print_r($_POST);die;
            $oldIDs = ArrayHelper::map($reportsData, 'id', 'id');
            $reportsData = Model::createMultiple(ReportIjro::classname(), $reportsData);
            Model::loadMultiple($reportsData, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($reportsData, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validateMultiple($reportsData);
            }

            // validate all models
            $valid = Model::validateMultiple($reportsData);

            if ($valid) {

                $transaction = \Yii::$app->db->beginTransaction();

                try {

                    $flag = false;

                    if (!empty($deletedIDs)) {
                        ReportIjro::deleteAll(['id' => $deletedIDs]);
                    }

                    foreach ($reportsData as $data) {
                        $data->report_id = $model->id;
                        $data->send_date = date('Y-m-d',strtotime($data->send_date));
                        if (! ($flag = $data->save(false))) {
                            $transaction->rollBack();
                            break;
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        Yii::$app->session->setFlash('report-saved');
                        return $this->redirect(['system/index','id'=>$id]);
                    }

                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

        }

        $user = SiteUser::findOne(Yii::$app->user->id);

        return $this->render('fill-report-ijro',[
            'model' => $model,
            'user' => $user,
            'reportsData' => (empty($reportsData)) ? [new ReportIjro()] : $reportsData
        ]);
    }

    public function actionFillReportMurojat($id){

        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $model = Report::findOne($id);
        $reportsData = ReportMurojat::find()->where(['report_id'=>$id])->all();

        if($model->user_id != Yii::$app->user->getId() || $model->status > 20){
            return $this->goBack();
        }

        if($model->load(Yii::$app->request->post())){
//            print_r($_POST);die;
            $oldIDs = ArrayHelper::map($reportsData, 'id', 'id');
            $reportsData = Model::createMultiple(ReportMurojat::classname(), $reportsData);
            Model::loadMultiple($reportsData, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($reportsData, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validateMultiple($reportsData);
            }

            // validate all models
            $valid = Model::validateMultiple($reportsData);

            if ($valid) {

                $transaction = \Yii::$app->db->beginTransaction();

                try {

                    $flag = false;

                    if (!empty($deletedIDs)) {
                        ReportMurojat::deleteAll(['id' => $deletedIDs]);
                    }

                    foreach ($reportsData as $data) {
                        $data->report_id = $model->id;
                        $data->murojat_date = date('Y-m-d',strtotime($data->murojat_date));
                        $data->rad_qilish_date = date('Y-m-d',strtotime($data->rad_qilish_date));
                        if (! ($flag = $data->save(false))) {
                            $transaction->rollBack();
                            break;
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        Yii::$app->session->setFlash('report-saved');
                        return $this->redirect(['system/index','id'=>$id]);
                    }

                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

        }

        $user = SiteUser::findOne(Yii::$app->user->id);

        return $this->render('fill-report-murojat',[
            'model' => $model,
            'user' => $user,
            'reportsData' => (empty($reportsData)) ? [new ReportMurojat()] : $reportsData
        ]);
    }

    public function actionFillReportAuksion($id){

        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $model = Report::findOne($id);
        $reportsData = ReportAuksion::find()->where(['report_id'=>$id])->all();

        if($model->user_id != Yii::$app->user->getId() || $model->status > 20){
            return $this->goBack();
        }

        if($model->load(Yii::$app->request->post())){
//            print_r($_POST);die;
            $oldIDs = ArrayHelper::map($reportsData, 'id', 'id');
            $reportsData = Model::createMultiple(ReportAuksion::classname(), $reportsData);
            Model::loadMultiple($reportsData, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($reportsData, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validateMultiple($reportsData);
            }

            // validate all models
            $valid = Model::validateMultiple($reportsData);

            if ($valid) {

                $transaction = \Yii::$app->db->beginTransaction();

                try {

                    $flag = false;

                    if (!empty($deletedIDs)) {
                        ReportAuksion::deleteAll(['id' => $deletedIDs]);
                    }

                    foreach ($reportsData as $data) {

                        $data->report_id = $model->id;


                        $data->xulosa_date = date('Y-m-d',strtotime($data->xulosa_date));
                        $data->topshirish_sanasi = date('Y-m-d',strtotime($data->topshirish_sanasi));

                        if (! ($flag = $data->save(false))) {
                            $transaction->rollBack();
                            break;
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        Yii::$app->session->setFlash('report-saved');
                        return $this->redirect(['system/index','id'=>$id]);
                    }

                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

        }

        $user = SiteUser::findOne(Yii::$app->user->id);

        return $this->render('fill-report-auksion',[
            'model' => $model,
            'user' => $user,
            'reportsData' => (empty($reportsData)) ? [new ReportAuksion()] : $reportsData
        ]);
    }

    public function actionFillReportRuxsatnoma($id){

        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $model = Report::findOne($id);
        $reportsData = ReportRuxsatnoma::find()->where(['report_id'=>$id])->all();

        if($model->user_id != Yii::$app->user->getId() || $model->status > 20){
            return $this->goBack();
        }

        if($model->load(Yii::$app->request->post())){
//            print_r($_POST);die;
            $oldIDs = ArrayHelper::map($reportsData, 'id', 'id');
            $reportsData = Model::createMultiple(ReportRuxsatnoma::classname(), $reportsData);
            Model::loadMultiple($reportsData, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($reportsData, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validateMultiple($reportsData);
            }

            // validate all models
            $valid = Model::validateMultiple($reportsData);

            if ($valid) {

                $transaction = \Yii::$app->db->beginTransaction();

                try {

                    $flag = false;

                    if (!empty($deletedIDs)) {
                        ReportRuxsatnoma::deleteAll(['id' => $deletedIDs]);
                    }

                    foreach ($reportsData as $data) {
                        $data->report_id = $model->id;

                        $data->ruxsatnoma_date = date('Y-m-d',strtotime($data->ruxsatnoma_date));
                        $data->xulosa_date = date('Y-m-d',strtotime($data->xulosa_date));

                        if (! ($flag = $data->save(false))) {
                            $transaction->rollBack();
                            break;
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        Yii::$app->session->setFlash('report-saved');
                        return $this->redirect(['system/index','id'=>$id]);
                    }

                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

        }

        $user = SiteUser::findOne(Yii::$app->user->id);

        return $this->render('fill-report-ruxsatnoma',[
            'model' => $model,
            'user' => $user,
            'reportsData' => (empty($reportsData)) ? [new ReportRuxsatnoma()] : $reportsData
        ]);
    }

    public function actionFillReportUyjoyRuxsatnoma($id){

        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $model = Report::findOne($id);
        $reportsData = ReportUyjoyRuxsatnoma::find()->where(['report_id'=>$id])->all();

        if($model->user_id != Yii::$app->user->getId() || $model->status > 20){
            return $this->goBack();
        }

        if($model->load(Yii::$app->request->post())){
//            print_r($_POST);die;
            $oldIDs = ArrayHelper::map($reportsData, 'id', 'id');
            $reportsData = Model::createMultiple(ReportUyjoyRuxsatnoma::classname(), $reportsData);
            Model::loadMultiple($reportsData, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($reportsData, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validateMultiple($reportsData);
            }

            // validate all models
            $valid = Model::validateMultiple($reportsData);

            if ($valid) {

                $transaction = \Yii::$app->db->beginTransaction();

                try {

                    $flag = false;

                    if (!empty($deletedIDs)) {
                        ReportUyjoyRuxsatnoma::deleteAll(['id' => $deletedIDs]);
                    }

                    foreach ($reportsData as $data) {
                        $data->report_id = $model->id;

                        $data->ruxsatnoma_date = date('Y-m-d',strtotime($data->ruxsatnoma_date));
                        $data->xulosa_date = date('Y-m-d',strtotime($data->xulosa_date));

                        if (! ($flag = $data->save(false))) {
                            $transaction->rollBack();
                            break;
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        Yii::$app->session->setFlash('report-saved');
                        return $this->redirect(['system/index','id'=>$id]);
                    }

                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

        }

        $user = SiteUser::findOne(Yii::$app->user->id);

        return $this->render('fill-report-uyjoy-ruxsatnoma',[
            'model' => $model,
            'user' => $user,
            'reportsData' => (empty($reportsData)) ? [new ReportUyjoyRuxsatnoma()] : $reportsData
        ]);
    }

    public function actionFillReportFoydalanishgaQabulqilish($id){

        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $model = Report::findOne($id);
        $reportsData = ReportFoydalanishgaQabulqilish::find()->where(['report_id'=>$id])->all();

        if($model->user_id != Yii::$app->user->getId() || $model->status > 20){
            return $this->goBack();
        }

        if($model->load(Yii::$app->request->post())){
//            print_r($_POST);die;
            $oldIDs = ArrayHelper::map($reportsData, 'id', 'id');
            $reportsData = Model::createMultiple(ReportFoydalanishgaQabulqilish::classname(), $reportsData);
            Model::loadMultiple($reportsData, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($reportsData, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validateMultiple($reportsData);
            }

            // validate all models
            $valid = Model::validateMultiple($reportsData);

            if ($valid) {

                $transaction = \Yii::$app->db->beginTransaction();

                try {

                    $flag = false;

                    if (!empty($deletedIDs)) {
                        ReportFoydalanishgaQabulqilish::deleteAll(['id' => $deletedIDs]);
                    }

                    foreach ($reportsData as $data) {
                        $data->report_id = $model->id;

                        $data->ruxsatnoma_date = date('Y-m-d',strtotime($data->ruxsatnoma_date));
                        $data->xulosa_date = date('Y-m-d',strtotime($data->xulosa_date));
                        
                        if (! ($flag = $data->save(false))) {
                            $transaction->rollBack();
                            break;
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        Yii::$app->session->setFlash('report-saved');
                        return $this->redirect(['system/index','id'=>$id]);
                    }

                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

        }

        $user = SiteUser::findOne(Yii::$app->user->id);

        return $this->render('fill-report-foydalanishga-qabulqilish',[
            'model' => $model,
            'user' => $user,
            'reportsData' => (empty($reportsData)) ? [new ReportFoydalanishgaQabulqilish()] : $reportsData
        ]);
    }

    public function actionSendReport($id){

        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $model = Report::findOne($id);
        $model->status = 30;
        $model->closed_date = date("Y-m-d h:i:s");
        if($model->save()){
            return $this->referrer();
        }
    }

    public function actionAllReports(){

        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $searchModel = new ReportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $user = SiteUser::findOne(Yii::$app->user->getId());

        if($user->rank == 2){
            $dataProvider->query->andWhere(['user_id'=>$user->id]);
        }

        $pageTitle = 'Barcha hisobot blankalari';

        return $this->render('all-reports',[
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'user' => $user,
            'pageTitle' => $pageTitle
        ]);
    }

    public function actionReportResult($id){

        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $report = Report::findOne($id);
        switch ($report->document_type){
            case 1:
                $searchModel = new ReportOffenseSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $dataProvider->query->andFilterWhere(['report_id' => $report->id]);
                return $this->render('category-one',[
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                    'report' => $report
                ]);
            break;
            case 2:
                $searchModel = new ReportIjroSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $dataProvider->query->andFilterWhere(['report_id' => $report->id]);
                return $this->render('category-two',[
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                    'report' => $report
                ]);
                break;
            case 3:
                $searchModel = new ReportMurojatSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $dataProvider->query->andFilterWhere(['report_id' => $report->id]);
                return $this->render('category-three',[
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                    'report' => $report
                ]);
                break;
            case 4:
                $searchModel = new ReportAuksionSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $dataProvider->query->andFilterWhere(['report_id' => $report->id]);
                return $this->render('category-four',[
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                    'report' => $report
                ]);
                break;
            case 5:
                $searchModel = new ReportRuxsatnomaSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $dataProvider->query->andFilterWhere(['report_id' => $report->id]);
                return $this->render('category-fife',[
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                    'report' => $report
                ]);
                break;
            case 6:
                $searchModel = new ReportUyjoyRuxsatnomaSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $dataProvider->query->andFilterWhere(['report_id' => $report->id]);
                return $this->render('category-six',[
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                    'report' => $report
                ]);
                break;
            case 7:
                $searchModel = new ReportFoydalanishgaQabulqilishSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $dataProvider->query->andFilterWhere(['report_id' => $report->id]);
                return $this->render('category-seven',[
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                    'report' => $report
                ]);
                break;
        }
    }

    public function actionAccept($id){

        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $user = SiteUser::findOne(Yii::$app->user->getId());
        if($user->getRank() > 1){
            return $this->referrer();
        }

        $model = Report::findOne($id);
        if(!empty($model)){
            $model->status = 40;
            if($model->save()){
                return $this->redirect(['system/accepted']);
            }
        }

    }

    public function actionAccepted(){

        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $searchModel = new ReportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['status'=>40]);
        $user = SiteUser::findOne(Yii::$app->user->getId());
        $pageTitle = 'Qabul qilinganlar';
        if($user->rank == 2){
            $dataProvider->query->andWhere(['user_id'=>$user->id]);
        }

        return $this->render('all-reports',[
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'user' => $user,
            'pageTitle' => $pageTitle
        ]);
    }

    public function actionDecline($id){

        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $user = SiteUser::findOne(Yii::$app->user->getId());
        if($user->getRank() > 1){
            return $this->referrer();
        }

        $model = Report::findOne($id);
        if(!empty($model)){
            $model->status = 20;
            if($model->save()){
                return $this->redirect(['system/declined']);
            }
        }

    }

    public function actionDeclined(){

        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $searchModel = new ReportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['status'=>20]);
        $user = SiteUser::findOne(Yii::$app->user->getId());
        $pageTitle = 'Tahrirga qaytganlar';
        if($user->rank == 2){
            $dataProvider->query->andWhere(['user_id'=>$user->id]);
        }

        return $this->render('all-reports',[
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'user' => $user,
            'pageTitle' => $pageTitle
        ]);
    }

    public function actionHisobot($id){

        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $users = SiteUser::find()->where(['>','rank',1])->all();


        return $this->render('hisobot',[
            'id' => $id,
            'users' => $users
        ]);
    }

    public function actionByUser($cat_id, $user_id = NULL){

        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }

        switch ($cat_id){
            case 1: $month = Yii::$app->request->get('ReportOffenseSearch')['month']; break;
            case 2: $month = Yii::$app->request->get('ReportIjroSearch')['month'];; break;
            case 3: $month = Yii::$app->request->get('ReportMurojatSearch')['month'];; break;
            case 4: $month = Yii::$app->request->get('ReportAuksionSearch')['month'];; break;
            case 5: $month = Yii::$app->request->get('ReportRuxsatnomaSearch')['month'];; break;
            case 6: $month = Yii::$app->request->get('ReportUyjoyRuxsatnomaSearch')['month'];; break;
            case 7: $month = Yii::$app->request->get('ReportFoydalanishgaQabulqilishSearch')['month'];; break;
        }

        if(empty($user_id)){
            switch ($cat_id){
                case 1: $user_id = Yii::$app->request->get('ReportOffenseSearch')['user_id']; break;
                case 2: $user_id = Yii::$app->request->get('ReportIjroSearch')['user_id'];; break;
                case 3: $user_id = Yii::$app->request->get('ReportMurojatSearch')['user_id'];; break;
                case 4: $user_id = Yii::$app->request->get('ReportAuksionSearch')['user_id'];; break;
                case 5: $user_id = Yii::$app->request->get('ReportRuxsatnomaSearch')['user_id'];; break;
                case 6: $user_id = Yii::$app->request->get('ReportUyjoyRuxsatnomaSearch')['user_id'];; break;
                case 7: $user_id = Yii::$app->request->get('ReportFoydalanishgaQabulqilishSearch')['user_id'];; break;
            }

            if(empty($user_id)){
                $user = SiteUser::findOne(Yii::$app->user->getId());
                if($user->getRank() == 2){
                    $user_id = Yii::$app->user->getId();
                }
            }
        }


        $reports = Report::find()->where(['document_type'=>$cat_id])->andWhere(['user_id'=>$user_id])->andWhere(['month'=>$month])->all();

        if(empty($month)){

            $reports = Report::find()->where(['document_type'=>$cat_id])->andWhere(['user_id'=>$user_id])->all();

        }

        if(empty($user_id)){

            $reports = Report::find()->where(['document_type'=>$cat_id])->andWhere(['month'=>$month])->all();

            if(empty($month)){

                $reports = Report::find()->where(['document_type'=>$cat_id])->all();

            }

        }


        $reportsId = ArrayHelper::map($reports,'id','id');

        switch ($cat_id){
            case 1:
                $searchModel = new ReportOffenseSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $dataProvider->query->andwhere(['report_id'=>$reportsId]);
                break;
            case 2:
                $searchModel = new ReportIjroSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $dataProvider->query->andWhere(['report_id'=>$reportsId]);
                break;
            case 3:
                $searchModel = new ReportMurojatSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $dataProvider->query->andWhere(['report_id'=>$reportsId]);
                break;
            case 4:
                $searchModel = new ReportAuksionSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $dataProvider->query->andWhere(['report_id'=>$reportsId]);
                break;
            case 5:
                $searchModel = new ReportRuxsatnomaSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $dataProvider->query->andWhere(['report_id'=>$reportsId]);
                break;
            case 6:
                $searchModel = new ReportUyjoyRuxsatnomaSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $dataProvider->query->andWhere(['report_id'=>$reportsId]);
                break;
            case 7:
                $searchModel = new ReportFoydalanishgaQabulqilishSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $dataProvider->query->andWhere(['report_id'=>$reportsId]);
                break;
        }

        return $this->render('by-user',[
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'doc_type' => $cat_id,
            'user_id' => $user_id
        ]);
    }

    public function actionStatistics(){
        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }
        $user = SiteUser::findOne(Yii::$app->user->getId());

        $allUsers = SiteUser::find()->where(['rank'=>2])->all();

        return $this->render('statistics',[
            'user' => $user,
            'allUsers' => $allUsers
        ]);
    }

    public function actionByRegion(){
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getProperties()->setCreator('Xushboqov Jahongir')
            ->setLastModifiedBy('Jahongir Xushboqov')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Test result file');

        $spreadsheet->setActiveSheetIndex(0);

        $styleArray = array(
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ),
            ),
        );

        $spreadsheet->getDefaultStyle()->applyFromArray($styleArray);

        $spreadsheet->getActiveSheet()->mergeCells('A1:H2');

        $spreadsheet->getActiveSheet()->setCellValue('A1','Туманлар кесими бўйича')->getStyle('A1')->applyFromArray([
            'font'=> [
                'bold' => true,
                'size' => 16
            ]
        ])->getAlignment()->setHorizontal('center')->setVertical('center')->setWrapText(true);

        $index = 1;
        $row = 4;

        $districts = District::find()->where(['parent'=>8])->all();
        $admission = new Admission();
        foreach ($districts as $district) {

            $user = \common\models\SiteUser::find()->where
            (['district_id'=>$district->id])->andWhere(['<','rank',1000])->one();

            $spreadsheet->getActiveSheet()->setCellValue('A'.$row , $index)->getStyle('A'.$row)->getAlignment()->setHorizontal('center')->setVertical('center');
            $spreadsheet->getActiveSheet()->setCellValue('B'.$row , $district->name)->getStyle('B'.$row)->getAlignment()
                ->setHorizontal('center')->setWrapText(true)->setVertical('center');
            $spreadsheet->getActiveSheet()->setCellValue('C'.$row , $admission->count(NULL,$user->id))->getStyle
            ('C'.$row)
                ->getAlignment()
                ->setHorizontal('center')->setWrapText(true)->setVertical('center');
            $spreadsheet->getActiveSheet()->setCellValue('D'.$row , $admission->filterTwo($user->id,1))->getStyle
            ('D'.$row)
                ->getAlignment()
                ->setHorizontal('center')->setWrapText(true)->setVertical('center');
            $spreadsheet->getActiveSheet()->setCellValue('E'.$row , $admission->filterTwo($user->id,[6,7]))->getStyle
            ('E'
                .$row)
                ->getAlignment()
                ->setHorizontal('center')->setWrapText(true)->setVertical('center');

            $spreadsheet->getActiveSheet()->setCellValue('F'.$row , $admission->filterTwo($user->id,2))->getStyle
            ('F'
                .$row)
                ->getAlignment()
                ->setHorizontal('center')->setWrapText(true)->setVertical('center');
            $spreadsheet->getActiveSheet()->setCellValue('G'.$row , $admission->filterTwo($user->id,3))->getStyle
            ('G'
                .$row)
                ->getAlignment()
                ->setHorizontal('center')->setWrapText(true)->setVertical('center');
            $spreadsheet->getActiveSheet()->setCellValue('H'.$row , $admission->filterTwoBroken($user->id,6))->getStyle
            ('H'
                .$row)
                ->getAlignment()
                ->setHorizontal('center')->setWrapText(true)->setVertical('center');

            $spreadsheet->getActiveSheet()->getRowDimension(2)->setRowHeight(50);
            $spreadsheet->getActiveSheet()->getRowDimension($row)->setRowHeight(30);

            $row++;
            $index++;

        }

        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth('5');
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth('50');
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth('15');
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth('15');
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth('15');
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth('15');
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth('15');
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth('15');

        $spreadsheet->getActiveSheet()
            ->setCellValue('A3','№')
            ->setCellValue('B3','Туман')
            ->setCellValue('C3','Сони')
            ->setCellValue('D3','Янги')
            ->setCellValue('E3','Ёпилган')
            ->setCellValue('F3','Жараёнда')
            ->setCellValue('G3','Муддати бузилган')
            ->setCellValue('H3','Муддати бузилиб ёпилган');


        $spreadsheet->getActiveSheet()->getStyle('A3:H3')->getAlignment()->setHorizontal('center')->setWrapText(true)
            ->setVertical('center');

        $spreadsheet->getActiveSheet()->getStyle('A3:H3')->applyFromArray(
            array(
                'font' => array(
                    'size' => 13,
                    'bold' => true
                ),
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => 'FFF9812A',
                    ],
                ]
            )
        );

        date_default_timezone_set('Asia/Tashkent');
        $spreadsheet->setActiveSheetIndex(0);
// Redirect output to a client’s web browser (Xls)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="base-'.date('dmY-his').'.xls"');
        header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0
        $writer = IOFactory::createWriter($spreadsheet, 'Xls');
        $writer->save('php://output');
        exit;

    }

    public function actionExportMain(){

        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $spreadsheet = new Spreadsheet();
        $spreadsheet->getProperties()->setCreator('Xushboqov Jahongir')
            ->setLastModifiedBy('Jahongir Xushboqov')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Test result file');

        $spreadsheet->setActiveSheetIndex(0);

        $styleArray = array(
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ),
            ),
        );

        $spreadsheet->getDefaultStyle()->applyFromArray($styleArray);

        $spreadsheet->getActiveSheet()->mergeCells('A1:I2');

        $spreadsheet->getActiveSheet()->setCellValue('A1','Blankalar kategoriyalari va Tumanlar bo\'yicha')->getStyle('A1')->applyFromArray([
            'font'=> [
                'bold' => true,
                'size' => 16
            ]
        ])->getAlignment()->setHorizontal('center')->setVertical('center')->setWrapText(true);

        $index = 1;
        $row = 4;

        $allUsers = SiteUser::find()->where(['rank'=>2])->all();

        $categoriesSum[0] = 0;
        $categoriesSum[1] = 0;
        $categoriesSum[2] = 0;
        $categoriesSum[3] = 0;
        $categoriesSum[4] = 0;
        $categoriesSum[5] = 0;
        $categoriesSum[6] = 0;

        foreach ($allUsers as $user) {
            $district = District::findOne($user->district_id);
            $spreadsheet->getActiveSheet()->setCellValue('A'.$row , $index)->getStyle('A'.$row)->getAlignment()->setHorizontal('center')->setVertical('center');
            $spreadsheet->getActiveSheet()->setCellValue('B'.$row , $district->name)->getStyle('B'.$row)->getAlignment()
                ->setHorizontal('center')->setWrapText(true)->setVertical('center');
            $spreadsheet->getActiveSheet()->setCellValue('C'.$row , \common\models\ReportOffense::getCount($user->id))->getStyle('B'.$row)->getAlignment()
                ->setHorizontal('center')->setWrapText(true)->setVertical('center');
            $spreadsheet->getActiveSheet()->setCellValue('D'.$row , \common\models\ReportIjro::getCount($user->id))->getStyle('B'.$row)->getAlignment()
                ->setHorizontal('center')->setWrapText(true)->setVertical('center');
            $spreadsheet->getActiveSheet()->setCellValue('E'.$row , \common\models\ReportMurojat::getCount($user->id))->getStyle('B'.$row)->getAlignment()
                ->setHorizontal('center')->setWrapText(true)->setVertical('center');
            $spreadsheet->getActiveSheet()->setCellValue('F'.$row , \common\models\ReportAuksion::getCount($user->id))->getStyle('B'.$row)->getAlignment()
                ->setHorizontal('center')->setWrapText(true)->setVertical('center');
            $spreadsheet->getActiveSheet()->setCellValue('G'.$row , \common\models\ReportRuxsatnoma::getCount($user->id))->getStyle('B'.$row)->getAlignment()
                ->setHorizontal('center')->setWrapText(true)->setVertical('center');
            $spreadsheet->getActiveSheet()->setCellValue('H'.$row , \common\models\ReportUyjoyRuxsatnoma::getCount($user->id))->getStyle('B'.$row)->getAlignment()
                ->setHorizontal('center')->setWrapText(true)->setVertical('center');

            $spreadsheet->getActiveSheet()->setCellValue('I'.$row , \common\models\ReportFoydalanishgaQabulqilish::getCount($user->id))->getStyle('B'.$row)
                ->getAlignment()
                ->setHorizontal('center')
                ->setWrapText(true)
                ->setVertical('center');


            $spreadsheet->getActiveSheet()->getRowDimension(2)->setRowHeight(50);
            $spreadsheet->getActiveSheet()->getRowDimension($row)->setRowHeight(20);

            $categoriesSum[0] += \common\models\ReportOffense::getCount($user->id);
            $categoriesSum[1] += \common\models\ReportIjro::getCount($user->id);
            $categoriesSum[2] += \common\models\ReportMurojat::getCount($user->id);
            $categoriesSum[3] += \common\models\ReportAuksion::getCount($user->id);
            $categoriesSum[4] += \common\models\ReportRuxsatnoma::getCount($user->id);
            $categoriesSum[5] += \common\models\ReportUyjoyRuxsatnoma::getCount($user->id);
            $categoriesSum[6] += \common\models\ReportFoydalanishgaQabulqilish::getCount($user->id);

            $row++;
            $index++;


        }
        $spreadsheet->getActiveSheet()->mergeCells("A19:B19");

        $spreadsheet->getActiveSheet()->setCellValue('A'.$row , 'Jami')->getStyle('A'.$row)->getAlignment()->setHorizontal('center')->setVertical('center');
        $spreadsheet->getActiveSheet()->setCellValue('C'.$row , $categoriesSum[0])->getStyle('B'.$row)->getAlignment()
            ->setHorizontal('center')->setWrapText(true)->setVertical('center');
        $spreadsheet->getActiveSheet()->setCellValue('D'.$row , $categoriesSum[1])->getStyle('B'.$row)->getAlignment()
            ->setHorizontal('center')->setWrapText(true)->setVertical('center');
        $spreadsheet->getActiveSheet()->setCellValue('E'.$row , $categoriesSum[2])->getStyle('B'.$row)->getAlignment()
            ->setHorizontal('center')->setWrapText(true)->setVertical('center');
        $spreadsheet->getActiveSheet()->setCellValue('F'.$row , $categoriesSum[3])->getStyle('B'.$row)->getAlignment()
            ->setHorizontal('center')->setWrapText(true)->setVertical('center');
        $spreadsheet->getActiveSheet()->setCellValue('G'.$row , $categoriesSum[4])->getStyle('B'.$row)->getAlignment()
            ->setHorizontal('center')->setWrapText(true)->setVertical('center');
        $spreadsheet->getActiveSheet()->setCellValue('H'.$row , $categoriesSum[5])->getStyle('B'.$row)->getAlignment()
            ->setHorizontal('center')->setWrapText(true)->setVertical('center');

        $spreadsheet->getActiveSheet()->setCellValue('I'.$row , $categoriesSum[6])->getStyle('B'.$row)
            ->getAlignment()
            ->setHorizontal('center')
            ->setWrapText(true)
            ->setVertical('center');

        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth('5');
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth('20');
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth('20');
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth('20');
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth('20');
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth('45');
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth('45');
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth('45');
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth('45');


        $spreadsheet->getActiveSheet()
            ->setCellValue('A3','№')
            ->setCellValue('B3','Tuman')
            ->setCellValue('C3','	Shaharsozlik va qurilish sohasida sodir etilgan huquqbuzarlikni aniqlash va ularni bartaraf etish')
            ->setCellValue('D3','Bosh boshqarma tomonidan yuborilgan xujjatlar (xatlar, topshiriq, qaror, farmoyish, bayonlar) ijrosi to\'g\'risida ma\'lumot')
            ->setCellValue('E3','Tadbirkorlik sub’yektlarining yer uchastkasi (qishloq xo‘jaligi yerlaridan tashqari) ajratish haqida murojaatlarining ko‘rib chiqilishi to‘g‘risida ma\'lumot')
            ->setCellValue('F3','O‘zbekiston Respublikasi Vazirlar Mahkamasining 2019 yil 20 dekabrdagi “Tadbirkorlik va shaharsozlik faoliyatini amalga oshirish uchun bo‘sh turgan yer uchastkalarini berish tartib-taomillarini yanada takomillashtirish chora-tadbirlari to‘g‘risida”gi 1023-sonli qaroriga asosan "E-ijro" auksion savdosiga chiqarilgan yer uchastkalari to‘g‘risida ma\'lumot')
            ->setCellValue('G3','O‘zbekiston Respublikasi Vazirlar Mahkamasining 2018 yil 18 maydagi “Arxitektura va qurilish sohasida davlat xizmatlari ko‘rsatishning ayrim ma’muriy reglamentlarini tasdiqlash to‘g‘risida”gi 370-sonli qaroriga muvofiq Davlat xizmatlari markazlari orqali “Ob’yektni qayta ixtisoslashtirish va rekonstruksiya qilishga ruxsatnoma berish” Davlat xizmati turi bo‘yicha Surxondaryo viloyatiga kelib tushgan murojaatlar to‘g‘risida ma\'lumot')
            ->setCellValue('H3','O‘zbekiston Respublikasi Vazirlar Mahkamasining 2018 yil 18 maydagi “Arxitektura va qurilish sohasida davlat xizmatlari ko‘rsatishning ayrim ma’muriy reglamentlarini tasdiqlash to‘g‘risida”gi 370-sonli qaroriga muvofiq Davlat xizmatlari markazlari orqali “Yakka tartibda uy-joy qurishga (rekonstruksiya qilishga) ruxsatnoma berish” Davlat xizmati turi bo‘yicha Surxondaryo viloyatiga kelib tushgan murojaatlar to‘g‘risida ma\'lumot')
            ->setCellValue('I3','O‘zbekiston Respublikasi Vazirlar Mahkamasining 2018 yil 18 maydagi “Arxitektura va qurilish sohasida davlat xizmatlari ko‘rsatishning ayrim ma’muriy reglamentlarini tasdiqlash to‘g‘risida”gi 370-sonli qaroriga muvofiq Davlat xizmatlari markazlari orqali “Qurilishi (rekonstruksiyasi) tugallangan bino va inshootlarni foydalanishga qabul qilish” Davlat xizmati turi bo‘yicha Surxondaryo viloyatiga kelib tushgan murojaatlar to‘g‘risida ma\'lumot');


        $spreadsheet->getActiveSheet()->getStyle('A3:I3')->getAlignment()->setHorizontal('center')->setWrapText(true)
            ->setVertical('center');

        $spreadsheet->getActiveSheet()->getStyle('A3:I3')->applyFromArray(
            array(
                'font' => array(
                    'size' => 10,
                    'bold' => true
                ),
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => '24D3DC23',
                    ],
                ]
            )
        );
        date_default_timezone_set('Asia/Tashkent');
        $spreadsheet->setActiveSheetIndex(0);
// Redirect output to a client’s web browser (Xls)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="base-'.date('dmY-his').'.xls"');
        header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0
        $writer = IOFactory::createWriter($spreadsheet, 'Xls');
        $writer->save('php://output');
        exit;

    }
}