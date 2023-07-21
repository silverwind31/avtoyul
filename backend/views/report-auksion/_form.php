<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ReportAuksion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-auksion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'auksion_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foydalanish_maqsadi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maydoni')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auksion_loyihasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'xulosa_date')->textInput() ?>

    <?= $form->field($model, 'xulosa_number')->textInput() ?>

    <?= $form->field($model, 'xulosa_mazmuni')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rad_sababi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'topshirish_sanasi')->textInput() ?>

    <?= $form->field($model, 'topshirish_number')->textInput() ?>

    <?= $form->field($model, 'savdo_golibi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'report_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
