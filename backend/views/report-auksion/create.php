<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ReportAuksion */

$this->title = 'Create Report Auksion';
$this->params['breadcrumbs'][] = ['label' => 'Report Auksions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-auksion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
