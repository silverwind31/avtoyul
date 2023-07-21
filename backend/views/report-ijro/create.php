<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ReportIjro */

$this->title = 'Create Report Ijro';
$this->params['breadcrumbs'][] = ['label' => 'Report Ijros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-ijro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
