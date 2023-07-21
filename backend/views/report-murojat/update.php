<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ReportMurojat */

$this->title = 'Update Report Murojat: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Report Murojats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="report-murojat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
