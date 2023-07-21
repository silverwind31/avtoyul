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

        'attribute' => 'month',

        'content' => function($data){
            return Yii::$app->params['month']['uz'][\common\models\Report::findOne($data->report_id)->month];
        }

    ],

    [

        'attribute' => 'user_id',
        'content' => function($data){
            return \common\models\SiteUser::findOne(\common\models\Report::findOne($data->report_id)->user_id)->username;
        }

    ],

    'building_owner',
    'building_name',
    'doc_number_date',
    'tribunal_info',
    'commission_xabarnoma',
    'commission_davo',
    'problem_solve',
    'illegal_order',
    'legal_order',
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
                    $sheet->getColumnDimension('J')->setWidth(30);
                    $sheet->getStyle('A1:J1')->getAlignment()->setHorizontal('center')->setWrapText(true)
                        ->setVertical('center');
                }
            ]);

            ?>

            <?= \kartik\grid\GridView::widget([

                'dataProvider' => $dataProvider,

                'filterModel' => $searchModel,

                'layout' => '{items}',

                'tableOptions' => [

                    'class' => 'table table-hover table-striped table-responsive table-bordered gridview-table text-center',
                    'style' => 'text-align: center'

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

                        'attribute' => 'building_owner',

                        'contentOptions' => ['class' => 'v-align-middle'],

                    ],
                    [

                        'attribute' => 'building_name',

                        'contentOptions' => ['class' => 'v-align-middle'],

                    ],
                    [

                        'attribute' => 'doc_number_date',

                        'contentOptions' => ['class' => 'v-align-middle'],

                    ],
                    [

                        'attribute' => 'tribunal_info',

                        'contentOptions' => ['class' => 'v-align-middle'],

                    ],
                    [

                        'attribute' => 'commission_xabarnoma',

                        'contentOptions' => ['class' => 'v-align-middle'],

                    ],
                    [

                        'attribute' => 'commission_davo',

                        'contentOptions' => ['class' => 'v-align-middle'],

                    ],
                    [

                        'attribute' => 'problem_solve',

                        'contentOptions' => ['class' => 'v-align-middle'],

                    ],
                    [

                        'attribute' => 'illegal_order',

                        'contentOptions' => ['class' => 'v-align-middle'],

                    ],
                    [

                        'attribute' => 'legal_order',

                        'contentOptions' => ['class' => 'v-align-middle'],

                    ],
                    /*[

                                                                    'attribute' => 'report_id',

                                                                    'contentOptions' => ['class' => 'v-align-middle'],

                                                                ],*/
                    /*[

                                                                    'attribute' => 'created_date',

                                                                    'contentOptions' => ['class' => 'v-align-middle'],

                                                                ],*/
                    /*[

                                                                    'attribute' => 'update_date',

                                                                    'contentOptions' => ['class' => 'v-align-middle'],

                                                                ],*/
                    /*[

                                                                    'attribute' => 'user_id',

                                                                    'contentOptions' => ['class' => 'v-align-middle'],

                                                                ],*/


                ],



            ]); ?>

        </div>

    </div>

</div>