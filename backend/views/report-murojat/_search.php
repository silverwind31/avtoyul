<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ReportMurojatSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-murojat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'xudud_nomi') ?>

    <?= $form->field($model, 'murojat_fish') ?>

    <?= $form->field($model, 'murojat_date') ?>

    <?= $form->field($model, 'qabul_qilish_date') ?>

    <?php // echo $form->field($model, 'rad_qilish_date') ?>

    <?php // echo $form->field($model, 'rad_sabablari') ?>

    <?php // echo $form->field($model, 'report_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
