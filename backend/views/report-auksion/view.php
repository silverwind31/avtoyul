<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ReportAuksion */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Report Auksions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="report-auksion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'auksion_address',
            'foydalanish_maqsadi',
            'maydoni',
            'auksion_loyihasi',
            'xulosa_date',
            'xulosa_number',
            'xulosa_mazmuni',
            'rad_sababi',
            'topshirish_sanasi',
            'topshirish_number',
            'savdo_golibi',
            'report_id',
        ],
    ]) ?>

</div>
