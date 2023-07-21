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

                                  <?= $form->field($model, 'document_type')->textInput() ?>

                  <?= $form->field($model, 'year')->textInput() ?>

                  <?= $form->field($model, 'month')->textInput() ?>

                  <?= $form->field($model, 'user_id')->textInput() ?>

                  <?= $form->field($model, 'status')->textInput() ?>

                  <?= $form->field($model, 'created_date')->textInput() ?>

                  <?= $form->field($model, 'closed_date')->textInput() ?>



            </div>

        </div>

    </div>

    <div class="col-md-12">

        <?=  Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') :  Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

    </div>

<?php ActiveForm::end(); ?>
