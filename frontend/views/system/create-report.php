<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div class="col-md-9">
    <?php

    $form = ActiveForm::begin([


//        'enableAjaxValidation' => true,

        'enableClientValidation' => true,

        'errorCssClass' => '',

        'options' => ['enctype' => 'multipart/form-data']

    ]); ?>



    <div class="col-md-12">



        <div class="panel panel-default">



            <div class="panel-body">

                <?php if(Yii::$app->session->hasFlash('exists-error')): ?>
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Ushbu parametrlar bilan allaqachon hisobot blankasi shakllantirilib bo'lingan!
                        <hr> <strong>Boshqa parametrlar bilan yangi blankani shakllantiring!</strong>
                    </div>
                <?php endif; ?>

                <div class="row">

                    <div class="col-md-12">

                        <?= $form->field($model, 'user_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\SiteUser::find()->where(['rank' => 2])->all(),'id','username'),['multiple'=>'multiple']) ?>

                    </div>

                    <div class="col-md-12">

                        <?= $form->field($model, 'document_type')->dropDownList(Yii::$app->params['report_type'],['multiple'=>'multiple']) ?>

                    </div>

                    <div class="col-md-6">

                        <?= $form->field($model, 'year')->dropDownList(Yii::$app->params['year']) ?>

                    </div>

                    <div class="col-md-6">

                        <?= $form->field($model, 'month')->dropDownList(Yii::$app->params['month']['uz']) ?>

                    </div>

                    <div class="col-md-12">

                        <?=  Html::submitButton($model->isNewRecord ? Yii::t('main', 'Yuborish') :  Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

                    </div>

                </div>


            </div>



        </div>



    </div>







    <?php ActiveForm::end(); ?>
</div>