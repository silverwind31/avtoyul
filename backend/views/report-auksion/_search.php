<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ReportAuksionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-auksion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'auksion_address') ?>

    <?= $form->field($model, 'foydalanish_maqsadi') ?>

    <?= $form->field($model, 'maydoni') ?>

    <?= $form->field($model, 'auksion_loyihasi') ?>

    <?php // echo $form->field($model, 'xulosa_date') ?>

    <?php // echo $form->field($model, 'xulosa_number') ?>

    <?php // echo $form->field($model, 'xulosa_mazmuni') ?>

    <?php // echo $form->field($model, 'rad_sababi') ?>

    <?php // echo $form->field($model, 'topshirish_sanasi') ?>

    <?php // echo $form->field($model, 'topshirish_number') ?>

    <?php // echo $form->field($model, 'savdo_golibi') ?>

    <?php // echo $form->field($model, 'report_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
