<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ReportAuksionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Report Auksions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-auksion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Report Auksion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'auksion_address',
            'foydalanish_maqsadi',
            'maydoni',
            'auksion_loyihasi',
            //'xulosa_date',
            //'xulosa_number',
            //'xulosa_mazmuni',
            //'rad_sababi',
            //'topshirish_sanasi',
            //'topshirish_number',
            //'savdo_golibi',
            //'report_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
