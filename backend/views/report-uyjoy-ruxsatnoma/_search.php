<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ReportUyjoyRuxsatnomaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-uyjoy-ruxsatnoma-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'hudud_name') ?>

    <?= $form->field($model, 'ruxsatnoma_fish') ?>

    <?= $form->field($model, 'ruxsatnoma_date') ?>

    <?= $form->field($model, 'xulosa_date') ?>

    <?php // echo $form->field($model, 'xulosa_number') ?>

    <?php // echo $form->field($model, 'natija_ijobiy') ?>

    <?php // echo $form->field($model, 'natija_rad') ?>

    <?php // echo $form->field($model, 'rad_sababi') ?>

    <?php // echo $form->field($model, 'report_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
