<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ReportMurojat */

$this->title = 'Create Report Murojat';
$this->params['breadcrumbs'][] = ['label' => 'Report Murojats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-murojat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
