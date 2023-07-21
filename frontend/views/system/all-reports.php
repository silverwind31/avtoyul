<?php

use yii\grid\GridView;
use yii\helpers\Html;

?>

<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-body">

            <h3><?=$pageTitle?></h3>

            <?= GridView::widget([

                'dataProvider' => $dataProvider,

                'filterModel' => $searchModel,

                'layout' => '{items}',

                'tableOptions' => [

                    'class' => 'table table-hover table-striped table-bordered gridview-table'

                ],

                'columns' => [

                    [

                        'class' => 'yii\grid\SerialColumn',

                        'contentOptions' => ['class' => 'v-align-middle'],

                    ],
                    [

                        'attribute' => 'user_id',

                        'filter' => Html::activeDropDownList($searchModel, 'user_id', \yii\helpers\ArrayHelper::map(\common\models\SiteUser::find()->where(['rank'=>2])->all(),'id','username'),['class'=>'form-control','prompt' => Yii::t('main', 'Barcha filiallar')]),

                        'contentOptions' => ['class' => 'v-align-middle','style'=>'min-width:150px'],

                        'content' => function($data){
                            return \common\models\SiteUser::findOne($data->user_id)->username;
                        }

                    ],

                    [

                        'attribute' => 'document_type',

                        'filter' => Html::activeDropDownList($searchModel, 'document_type', Yii::$app->params['report_type'],['class'=>'form-control','prompt' => Yii::t('main', 'Barcha kategoriyalar')]),

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

                        'filter' => Html::activeDropDownList($searchModel, 'month', Yii::$app->params['month']['uz'],['class'=>'form-control','prompt' => Yii::t('main', 'Barcha oylar')]),

                        'contentOptions' => ['class' => 'v-align-middle','style'=>'min-width:120px'],

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

                        'header' => Yii::t('main', 'Natijalar'),

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

                ],



            ]); ?>
        </div>
    </div>
</div>