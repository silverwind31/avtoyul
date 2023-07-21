<?php


namespace frontend\controllers;


use common\components\Controller;
use frontend\models\LoginForm;
use Yii;
use yii\widgets\ActiveForm;

class UserController extends Controller
{
    public function actionLogin(){

        # Agar foydalanuvchi mehmon bo'lmasa, ro'yxatdan o'tgan bo'lsa
        if (!Yii::$app->user->isGuest) {
            return $this->referrer();
        }

//        $this->layout = 'login';

        $model = new LoginForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }


        if($model->load(Yii::$app->request->post()) && $model->login()){
            return $this->redirect('/system/index');
        }

        return $this->render('login',[
            'model' => $model
        ]);

    }

    public function actionLogout(){

        if (!Yii::$app->user->isGuest) {

            Yii::$app->user->logout(true);

        }

        return $this->goHome();
    }
}