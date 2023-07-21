<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ReportMurojatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Report Murojats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-murojat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Report Murojat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'xudud_nomi',
            'murojat_fish',
            'murojat_date',
            'qabul_qilish_date',
            //'rad_qilish_date',
            //'rad_sabablari',
            //'report_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
