<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ReportIjroSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-ijro-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'send_date') ?>

    <?= $form->field($model, 'send_number') ?>

    <?= $form->field($model, 'report_name') ?>

    <?= $form->field($model, 'deadline') ?>

    <?php // echo $form->field($model, 'responsible_man') ?>

    <?php // echo $form->field($model, 'position') ?>

    <?php // echo $form->field($model, 'execution_state') ?>

    <?php // echo $form->field($model, 'report_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
