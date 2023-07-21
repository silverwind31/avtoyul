<?php

use kartik\export\ExportMenu;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;

$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
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

            <h2><strong><?=$report->year?></strong> - Yil, <strong> <?=Yii::$app->params['month']['uz'][$report->month]?> </strong> oyi uchun, <?=Yii::$app->params['report_type'][$report->document_type]?> bo'yicha <strong><?=\common\models\SiteUser::findOne($report->user_id)->username?> </strong> hisoboti</h2>
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
            <?php if(\common\models\SiteUser::findOne(Yii::$app->user->getId())->getRank() == 1): ?>
                <div class="pull-right">
                    <a href="<?=\yii\helpers\Url::to(['system/accept','id'=>$report->id])?>" class="btn btn-success"><i class="fa fa-check-square"></i> Qabul qilish</a>
                    <a href="<?=\yii\helpers\Url::to(['system/decline','id'=>$report->id])?>" class="btn btn-warning"><i class="fa fa-edit"></i> Tahrirga qaytarish</a>
                </div>
            <?php endif; ?>

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