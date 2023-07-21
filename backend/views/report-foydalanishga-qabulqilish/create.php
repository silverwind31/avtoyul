<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ReportFoydalanishgaQabulqilish */

$this->title = 'Create Report Foydalanishga Qabulqilish';
$this->params['breadcrumbs'][] = ['label' => 'Report Foydalanishga Qabulqilishes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-foydalanishga-qabulqilish-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
