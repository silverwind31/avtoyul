<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ReportUyjoyRuxsatnoma */

$this->title = 'Create Report Uyjoy Ruxsatnoma';
$this->params['breadcrumbs'][] = ['label' => 'Report Uyjoy Ruxsatnomas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-uyjoy-ruxsatnoma-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
