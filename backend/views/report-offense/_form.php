<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile('/plugins/bootstrap-select2/select2.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);

?>

<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ckfinder/ckfinder.js"></script>

<?php $form = ActiveForm::begin([
    'id' => 'create-form' . $id,
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'errorCssClass' => '',
    'options' => ['enctype' => 'multipart/form-data']
]); ?>

    <div class="col-md-8">

        <div class="panel panel-default">

            <div class="panel-body">

                                  <?= $form->field($model, 'building_owner')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'building_name')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'doc_number_date')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'tribunal_info')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'commission_xabarnoma')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'commission_davo')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'problem_solve')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'illegal_order')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'legal_order')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'report_id')->textInput() ?>

                  <?= $form->field($model, 'created_date')->textInput() ?>

                  <?= $form->field($model, 'update_date')->textInput() ?>

                  <?= $form->field($model, 'user_id')->textInput() ?>



            </div>

        </div>

    </div>

    <div class="col-md-12">

        <?=  Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') :  Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

    </div>

<?php ActiveForm::end(); ?>
