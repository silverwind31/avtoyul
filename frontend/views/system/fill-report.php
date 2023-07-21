<?php

use wbraganca\dynamicform\DynamicFormWidget;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$js=<<< JS

    $(".dynamicform_wrapper").on("afterInsert", function(e, item) {
        $(item).find('input,textarea,select').each(function(index,element){
           $(element).val('');
        });
        
        jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
            jQuery(this).html("Huquqbuzarlik: " + (index + 1))
        });
        
        var datePickers = $(this).find('[data-krajee-kvdatepicker]');
        datePickers.each(function(index, el) {
            $(this).parent().removeData().kvDatepicker('initDPRemove');
            $(this).parent().kvDatepicker(eval($(this).attr('data-krajee-kvdatepicker')));
        });
    });

    $(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
        if (! confirm("Siz rostdan ham ushbu huquqbuzarlikni o'chirmoqchimisiz?")) {
            return false;
        }
        return true;
    });
    
    $(".dynamicform_wrapper").on("afterDelete", function(e) {
        jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
            jQuery(this).html("Huqubuzarlik: " + (index + 1))
        });
        console.log("Deleted item!");
    });
    
    $(".dynamicform_wrapper").on("limitReached", function(e, item) {
        alert("Limit reached");
    });

JS;
$this->registerJs($js, \yii\web\View::POS_READY);

?>

<div class="col-md-9">
    <?php

    $form = ActiveForm::begin([

            'id' => 'fill_form',

        'enableAjaxValidation' => true,

        'enableClientValidation' => true,

        'errorCssClass' => '',

        'options' => ['enctype' => 'multipart/form-data']

    ]); ?>

    <div class="col-md-12 hidden">

        <?= $form->field($model, 'user_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\SiteUser::find()->where(['rank' => 2])->all(),'id','username'),['multiple'=>'multiple','class'=>'hidden'])->label(false) ?>

    </div>

    <div class="col-md-12 hidden">

        <?= $form->field($model, 'document_type')->dropDownList(Yii::$app->params['report_type'],['class'=>'hidden'])->label(false) ?>

    </div>

    <div class="col-md-6 hidden">

        <?= $form->field($model, 'year')->dropDownList(Yii::$app->params['year'],['class'=>'hidden'])->label(false) ?>

    </div>

    <div class="col-md-6 hidden">

        <?= $form->field($model, 'month')->dropDownList(Yii::$app->params['month']['uz'],['class' => 'hidden'])->label(false) ?>

    </div>



    <div class="col-md-12">



        <div class="panel panel-default">


            <div class="panel-body">

                <h4>Blanka bo'yicha ma'lumot</h4>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Foydalanuvchi</th>
                        <td><?=$user->username?></td>
                    </tr>
                    <tr>
                        <th>Hisobot shakli</th>
                        <td><?=Yii::$app->params['report_type'][$model->document_type]?></td>
                    </tr>
                    <tr>
                        <th>Yil</th>
                        <td><?=Yii::$app->params['year'][$model->year]?></td>
                    </tr>
                    <tr>
                        <th>Oy</th>
                        <td><?=Yii::$app->params['month']['uz'][$model->month]?></td>
                    </tr>
                    <tr>
                        <th>Yuborilgan sa'na</th>
                        <td><?=$model->created_date?></td>
                    </tr>
                    <tr>
                        <th>Yopilgan sa'na</th>
                        <td><?=$model->closed_date?></td>
                    </tr>
                </table>

                <?php DynamicFormWidget::begin([
                    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                    'widgetBody' => '.container-items', // required: css class selector
                    'widgetItem' => '.item', // required: css class
                    'limit' => 999, // the maximum times, an element can be cloned (default 999)
                    'min' => 0, // 0 or 1 (default 1)
                    'insertButton' => '.add-item', // css class
                    'deleteButton' => '.remove-item', // css class
                    'model' => $reportsData[0],
                    'formId' => 'fill_form',
                    'formFields' => [
                        'building_owner',
                        'building_name',
                        'doc_number_date',
                        'tribunal_info',
                        'commission_xabarnoma',
                        'commission_davo',
                        'problem_solve',
                        'illegal_order',
                        'legal_order',
                    ],
                ]); ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-envelope"></i> Shaharsozlik va qurilish sohasida sodir etilgan huquqbuzarlikni aniqlash va ularni bartaraf etish
                        <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Yangi huquqbuzarlik qo'shish</button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body container-items"><!-- widgetContainer -->
                        <?php foreach ($reportsData as $index => $data): ?>
                            <div class="item panel offer-bg"><!-- widgetBody -->
                                <div class="panel-heading">
                                    <span class="panel-title-address">Huquqbuzarlik: <?= ($index + 1) ?></span>
                                    <div class="pull-right">
                                        <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                                        <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body">
                                    <?php
                                    // necessary for update action.
                                    if (!$data->isNewRecord) {
                                        echo Html::activeHiddenInput($data, "[{$index}]id");
                                    }
                                    ?>
                                    <?= $form->field($data, "[{$index}]building_owner")->textarea(['maxlength' => true, 'rows' => 2]) ?>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <?= $form->field($data, "[{$index}]building_name")->textarea(['maxlength' => true, 'rows' => 2]) ?>
                                        </div>
                                        <div class="col-sm-12">
                                            <?= $form->field($data, "[{$index}]doc_number_date")->textarea(['maxlength' => true, 'rows' => 2]) ?>
                                        </div>
                                    </div><!-- end:row -->

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <?= $form->field($data, "[{$index}]tribunal_info")->textarea(['maxlength' => true, 'rows' => 2]) ?>
                                        </div>
                                        <div class="col-sm-12">
                                            <?= $form->field($data, "[{$index}]commission_xabarnoma")->textarea(['maxlength' => true, 'rows' => 2])?>
                                        </div>
                                    </div><!-- end:row -->

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <?= $form->field($data, "[{$index}]commission_davo")->textarea(['maxlength' => true, 'rows' => 2]) ?>
                                        </div>
                                        <div class="col-sm-12">
                                            <?= $form->field($data, "[{$index}]problem_solve")->textarea(['maxlength' => true, 'rows' => 2]) ?>
                                        </div>
                                    </div><!-- end:row -->

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <?= $form->field($data, "[{$index}]illegal_order")->textarea(['maxlength' => true, 'rows' => 2]) ?>
                                        </div>
                                        <div class="col-sm-12">
                                            <?= $form->field($data, "[{$index}]legal_order")->textarea(['maxlength' => true, 'rows' => 2]) ?>
                                        </div>
                                    </div><!-- end:row -->

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <?php DynamicFormWidget::end(); ?>

                <div class="row">
                    <div class="col-md-12">

                        <?=  Html::submitButton($model->isNewRecord ? Yii::t('main', 'Yuborish') :  Yii::t('main', 'Saqlash'), ['class' => 'btn btn-primary']) ?>

                    </div>
                </div>

            </div>



        </div>



    </div>


    <?php ActiveForm::end(); ?>
</div>