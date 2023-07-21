<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ReportMurojat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-murojat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'xudud_nomi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'murojat_fish')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'murojat_date')->textInput() ?>

    <?= $form->field($model, 'qabul_qilish_date')->textInput() ?>

    <?= $form->field($model, 'rad_qilish_date')->textInput() ?>

    <?= $form->field($model, 'rad_sabablari')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'report_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
