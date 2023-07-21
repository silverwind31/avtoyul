<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ReportUyjoyRuxsatnoma */

$this->title = 'Update Report Uyjoy Ruxsatnoma: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Report Uyjoy Ruxsatnomas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="report-uyjoy-ruxsatnoma-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
