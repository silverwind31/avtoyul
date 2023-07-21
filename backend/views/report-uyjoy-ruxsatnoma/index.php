<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ReportUyjoyRuxsatnomaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Report Uyjoy Ruxsatnomas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-uyjoy-ruxsatnoma-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Report Uyjoy Ruxsatnoma', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'hudud_name',
            'ruxsatnoma_fish',
            'ruxsatnoma_date',
            'xulosa_date',
            //'xulosa_number',
            //'natija_ijobiy',
            //'natija_rad',
            //'rad_sababi',
            //'report_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
