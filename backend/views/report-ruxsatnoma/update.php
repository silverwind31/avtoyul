<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ReportRuxsatnoma */

$this->title = 'Update Report Ruxsatnoma: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Report Ruxsatnomas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="report-ruxsatnoma-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
