<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ReportIjro */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-ijro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'send_date')->textInput() ?>

    <?= $form->field($model, 'send_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'report_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deadline')->textInput() ?>

    <?= $form->field($model, 'responsible_man')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'execution_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'report_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
