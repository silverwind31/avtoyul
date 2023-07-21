<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ReportRuxsatnoma */

$this->title = 'Create Report Ruxsatnoma';
$this->params['breadcrumbs'][] = ['label' => 'Report Ruxsatnomas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-ruxsatnoma-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
