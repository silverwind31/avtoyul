<?php

use kartik\export\ExportMenu;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    [

        'attribute' => 'user_id',
        'content' => function($data){
            return \common\models\SiteUser::findOne(\common\models\Report::findOne($data->report_id)->user_id)->username;
        }

    ],
    [

        'attribute' => 'month',

        'content' => function($data){
            return Yii::$app->params['month']['uz'][\common\models\Report::findOne($data->report_id)->month];
        }

    ],
    'xudud_nomi',
    'murojat_fish',
    'murojat_date',
    'qabul_qilish_date',
    'rad_qilish_date',
    'rad_sabablari',
    ['class' => 'kartik\grid\ActionColumn'],
];


?>

<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-body">

            <?php

            // Renders a export dropdown menu
            echo ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumns,
                'clearBuffers' => true,
                'showColumnSelector' => false,
                'target' => ExportMenu::TARGET_BLANK,
                'filename' => 'export-' . date('Y-m-d-h-i-s'),
                'showConfirmAlert' => false,
                'boxStyleOptions' => [
                    ExportMenu::FORMAT_EXCEL_X => [
                        'borders' => [
                            'outline' => [
                                'borderStyle' => Border::BORDER_MEDIUM,
                            ],
                            'inside' => [
                                'borderStyle' => Border::BORDER_MEDIUM,
                            ],
                        ],

                    ],
                ],
                'exportConfig' => [
                    ExportMenu::FORMAT_PDF => [
                        'label' => Yii::t('kvexport', 'PDF'),
                        'iconOptions' => ['class' => 'text-danger'],
                        'linkOptions' => [],
                        'options' => ['title' => Yii::t('kvexport', 'Portable Document Format')],
                        'alertMsg' => Yii::t('kvexport', 'The PDF export file will be generated for download.'),
                        'mime' => 'application/pdf',
                        'extension' => 'pdf',
                        'writer' => ExportMenu::FORMAT_PDF,
                        'pdfConfig' => [
                            'methods' => [
                                'SetHeader' => ['terarx.uz - ' . date('Y-m-d H:i:s')],
                            ],
                        ],
                    ],
                ],
                'autoWidth' => false,
                'onRenderSheet' => function($sheet, $widget) {
                    $sheet->getColumnDimension('A')->setWidth(10);
                    $sheet->getColumnDimension('B')->setWidth(20);
                    $sheet->getColumnDimension('C')->setWidth(20);
                    $sheet->getColumnDimension('D')->setWidth(30);
                    $sheet->getColumnDimension('E')->setWidth(30);
                    $sheet->getColumnDimension('F')->setWidth(30);
                    $sheet->getColumnDimension('G')->setWidth(30);
                    $sheet->getColumnDimension('H')->setWidth(30);
                    $sheet->getColumnDimension('I')->setWidth(30);
                    $sheet->getStyle('A1:J1')->getAlignment()->setHorizontal('center')->setWrapText(true)
                        ->setVertical('center');
                }
            ]);

            ?>

            <hr>

            <?= \kartik\grid\GridView::widget([

                'dataProvider' => $dataProvider,

                'filterModel' => $searchModel,

                'layout' => '{items}',

                'tableOptions' => [

                    'class' => 'table table-hover table-striped table-responsive table-bordered gridview-table'

                ],

                'columns' => [


                    [

                        'class' => 'yii\grid\SerialColumn',

                        'contentOptions' => ['class' => 'v-align-middle'],

                    ],

                    [

                        'attribute' => 'user_id',

                        'filter' => Html::activeDropDownList($searchModel, 'user_id', ArrayHelper::map(\common\models\SiteUser::find()->where(['>','rank',1])->all(),'id','username'),['class'=>'form-control','prompt' => Yii::t('main', 'Barcha Foydalanuvchilar')]),

                        'contentOptions' => ['class' => 'v-align-middle','style'=>'min-width:150px; text-align:center'],

                        'content' => function($data){
                            return \common\models\SiteUser::findOne(\common\models\Report::findOne($data->report_id)->user_id)->username;
                        }

                    ],

                    [

                        'attribute' => 'month',

                        'filter' => Html::activeDropDownList($searchModel, 'month', Yii::$app->params['month']['uz'],['class'=>'form-control','prompt' => Yii::t('main', 'Barcha Oylar')]),

                        'contentOptions' => ['class' => 'v-align-middle','style'=>'min-width:150px; text-align:center'],

                        'content' => function($data){
                            return Yii::$app->params['month']['uz'][\common\models\Report::findOne($data->report_id)->month];
                        }

                    ],

                    [

                        'attribute' => 'xudud_nomi',

                        'contentOptions' => ['class' => 'v-align-middle'],

                    ],
                    [

                        'attribute' => 'murojat_fish',

                        'contentOptions' => ['class' => 'v-align-middle'],

                    ],
                    [

                        'attribute' => 'murojat_date',

                        'contentOptions' => ['class' => 'v-align-middle'],

                    ],
                    [

                        'attribute' => 'qabul_qilish_date',

                        'contentOptions' => ['class' => 'v-align-middle'],

                    ],
                    [

                        'attribute' => 'rad_qilish_date',

                        'contentOptions' => ['class' => 'v-align-middle'],

                    ],
                    [

                        'attribute' => 'rad_sabablari',

                        'contentOptions' => ['class' => 'v-align-middle'],

                    ],



                ],



            ]); ?>

        </div>

    </div>

</div>