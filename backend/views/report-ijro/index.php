<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ReportIjroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Report Ijros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-ijro-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Report Ijro', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'send_date',
            'send_number',
            'report_name',
            'deadline',
            //'responsible_man',
            //'position',
            //'execution_state',
            //'report_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
