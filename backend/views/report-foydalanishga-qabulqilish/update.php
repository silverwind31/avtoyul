<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ReportFoydalanishgaQabulqilish */

$this->title = 'Update Report Foydalanishga Qabulqilish: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Report Foydalanishga Qabulqilishes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="report-foydalanishga-qabulqilish-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
