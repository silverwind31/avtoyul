<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ReportAuksion */

$this->title = 'Update Report Auksion: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Report Auksions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="report-auksion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
