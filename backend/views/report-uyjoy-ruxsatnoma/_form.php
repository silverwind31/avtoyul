<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ReportUyjoyRuxsatnoma */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-uyjoy-ruxsatnoma-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hudud_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ruxsatnoma_fish')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ruxsatnoma_date')->textInput() ?>

    <?= $form->field($model, 'xulosa_date')->textInput() ?>

    <?= $form->field($model, 'xulosa_number')->textInput() ?>

    <?= $form->field($model, 'natija_ijobiy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'natija_rad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rad_sababi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'report_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
