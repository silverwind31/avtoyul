<?php

use yii\grid\GridView;
$columns = [];
if($user->rank == 2){
    $columns = [


        [

            'class' => 'yii\grid\SerialColumn',

            'contentOptions' => ['class' => 'v-align-middle'],

        ],

        [
            'attribute' => 'id',

            'contentOptions' => ['class' => 'v-align-middle'],

            'content' => function($data){
                $docActionLink = "";
                switch ($data->document_type){
                    case 1: $docActionLink =  "fill-report"; break;
                    case 2: $docActionLink =  "fill-report-ijro"; break;
                    case 3: $docActionLink =  "fill-report-murojat"; break;
                    case 4: $docActionLink =  "fill-report-auksion"; break;
                    case 5: $docActionLink =  "fill-report-ruxsatnoma"; break;
                    case 6: $docActionLink =  "fill-report-uyjoy-ruxsatnoma"; break;
                    case 7: $docActionLink =  "fill-report-foydalanishga-qabulqilish"; break;
                }
                return "
                    <a href='". \yii\helpers\Url::to(['system/'.$docActionLink,'id'=>$data->id]) ."' class='btn btn-primary btn-block mb-3'>Hisobotni to'ldirish</a>
                    <a href='". \yii\helpers\Url::to(['system/send-report','id'=>$data->id]) ."' class='btn btn-success btn-block'>Boshqarmaga yuborish</a>
                ";
            }
        ],
        [

            'attribute' => 'user_id',

            'contentOptions' => ['class' => 'v-align-middle'],

            'content' => function($data){
                return \common\models\SiteUser::findOne($data->user_id)->username;
            }

        ],

        [

            'attribute' => 'document_type',

            'contentOptions' => ['class' => 'v-align-middle'],

            'content' => function($data){
                return Yii::$app->params['report_type'][$data->document_type];
            }

        ],
        [

            'attribute' => 'year',

            'contentOptions' => ['class' => 'v-align-middle'],

        ],
        [

            'attribute' => 'month',

            'contentOptions' => ['class' => 'v-align-middle'],

            'content' => function($data){
                return Yii::$app->params['month']['uz'][$data->month];
            }

        ],

        [

            'attribute' => 'status',

            'contentOptions' => ['class' => 'v-align-middle'],

            'content' => function($data){
                $result = false;
                switch ($data->status){
                    case 10: $result = "<span class='btn btn-info'>Yangi</span>"; break;
                    case 20: $result = "<span class='btn btn-danger'>Tahrirga qaytarilgan</span>"; break;
                    case 30: $result = "<span class='btn btn-primary'>Yuborilgan</span>"; break;
                    case 40: $result = "<span class='btn btn-success'>Qabul qilingan</span>"; break;
                }
                return $result;
            }

        ],



    ];
}else{
    $columns = [


        [

            'class' => 'yii\grid\SerialColumn',

            'contentOptions' => ['class' => 'v-align-middle'],

        ],
        [

            'attribute' => 'user_id',

            'contentOptions' => ['class' => 'v-align-middle'],

            'content' => function($data){
                return \common\models\SiteUser::findOne($data->user_id)->username;
            }

        ],

        [

            'attribute' => 'document_type',

            'contentOptions' => ['class' => 'v-align-middle'],

            'content' => function($data){
                return Yii::$app->params['report_type'][$data->document_type];
            }

        ],
        [

            'attribute' => 'year',

            'contentOptions' => ['class' => 'v-align-middle'],

        ],
        [

            'attribute' => 'month',

            'contentOptions' => ['class' => 'v-align-middle'],

            'content' => function($data){
                return Yii::$app->params['month']['uz'][$data->month];
            }

        ],

        [

            'attribute' => 'status',

            'contentOptions' => ['class' => 'v-align-middle'],

            'content' => function($data){
                $result = false;
                switch ($data->status){
                    case 10: $result = "<span class='btn btn-info'>Yangi</span>"; break;
                    case 20: $result = "<span class='btn btn-danger'>Tahrirga qaytarilgan</span>"; break;
                    case 30: $result = "<span class='btn btn-primary'>Yuborilgan</span>"; break;
                    case 40: $result = "<span class='btn btn-success'>Qabul qilingan</span>"; break;
                }
                return $result;
            }

        ],

        [

            'class' => 'yii\grid\ActionColumn',

            'header' => Yii::t('main', 'Amallar'),

            'headerOptions' => ['style' => 'text-align:center'],

            'template' => '{buttons}',

            'contentOptions' => ['style' => '', 'class' => 'v-align-middle'],

            'buttons' => [

                'buttons' => function ($url, $model) {

                    $controller = Yii::$app->controller->id;

                    $code = <<<BUTTONS

	                                                <div class="btn-group flex-center">

	                                                    <a href="/{$controller}/report-result/{$model->id}" class="btn btn-info"><i class="fa fa-line-chart"></i> Jadvalni ko'rish</a>

	                                                </div>

BUTTONS;

                    return $code;

                }



            ],

        ],

    ];
}

?>

<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-body">

            <?php if(Yii::$app->session->getFlash('report-create-success')): ?>
                <div class="alert alert-success">
                    Blanka muvafaqqiyatli yaratildi!
                </div>
            <?php endif;?>
            <?php if(Yii::$app->session->getFlash('report-saved')): ?>
                <div class="alert alert-success">
                    Ma'lumotlar muvafaqqiyatli saqlandi!
                </div>
            <?php endif;?>
            <?php if($user->rank == 2): ?>

                <h3>Viloyat boshqarma tomonidan hisobotlar uchun yangi yoki tahrirga qaytgan blankalar</h3>

            <?php else: ?>

                <h3>Tumanlardan kelgan javob blankalar</h3>

            <?php endif; ?>

            <?= GridView::widget([

                'dataProvider' => $dataProvider,

                'filterModel' => $searchModel,

                'layout' => '{items}',

                'tableOptions' => [

                    'class' => 'table table-hover table-striped table-bordered gridview-table'

                ],

                'columns' => $columns,



            ]); ?>

            <?=  \yii\widgets\LinkPager::widget(['pagination' => $dataProvider->pagination])?>
        </div>
    </div>
</div>