<?php



use yii\helpers\Html;

use yii\widgets\ActiveForm;



$this->registerJsFile('/plugins/bootstrap-select2/select2.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);



?>



<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="/ckfinder/ckfinder.js"></script>



<?php $form = ActiveForm::begin([

    'enableAjaxValidation' => false,

    'enableClientValidation' => true,

    'errorCssClass' => '',

    'options' => ['enctype' => 'multipart/form-data']

]); ?>



    <div class="col-md-8">



        <div class="panel panel-default">



            <div class="panel-body">



<!--                                  --><?//= $form->field($model, 'region_id')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'leader_name')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'phone1')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'phone2')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'call_center')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>




            </div>



        </div>



    </div>



    <div class="col-md-12">



        <?=  Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') :  Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>



    </div>



<?php ActiveForm::end(); ?>

