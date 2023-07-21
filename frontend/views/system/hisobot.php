<?php

use common\models\ReportAuksionSearch;
use common\models\ReportFoydalanishgaQabulqilishSearch;
use common\models\ReportIjroSearch;
use common\models\ReportMurojatSearch;
use common\models\ReportRuxsatnomaSearch;
use common\models\ReportUyjoyRuxsatnomaSearch;
use yii\helpers\ArrayHelper;

$generalReports = ArrayHelper::map(\common\models\Report::find()->where(['document_type'=>$id])->all(),'id','id');

?>
<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-body">
            <h2 style="border: 1px solid #ccc; padding: 10px; background: #eee"><?=Yii::$app->params['report_type'][$id]?></h2>
            <h2 >Jami arizalar soni : <span class="btn btn-info btn-lg">
                    <?php switch ($id){
                        case 1: echo \common\models\ReportOffense::find()->count('id'); break;
                        case 2: echo \common\models\ReportIjro::find()->count('id'); break;
                        case 3: echo \common\models\ReportMurojat::find()->count('id'); break;
                        case 4: echo \common\models\ReportAuksion::find()->count('id'); break;
                        case 5: echo \common\models\ReportRuxsatnoma::find()->count('id'); break;
                        case 6: echo \common\models\ReportUyjoyRuxsatnoma::find()->count('id'); break;
                        case 7: echo \common\models\ReportFoydalanishgaQabulqilish::find()->count('id'); break;
                    } ?>


                </span></h2>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <?php foreach ($users as $user):?>
                    <?php

                        $userReports = \yii\helpers\ArrayHelper::map(\common\models\Report::find()->where(['user_id'=>$user->id])->andWhere(['document_type'=>$id])->all(),'id','id');

                    ?>
                    <a href="<?=\yii\helpers\Url::to(['by-user','cat_id'=>$id,'user_id'=>$user->id])?>" class="col-md-4" style="margin-bottom: 15px;">

                        <div class="btn btn-block btn-primary" style="padding: 20px 0; font-size: 16px; background: #f7fafc;border-color:#e5ebec; color: #333">
                            <?=$user->username?> | <span class="badge badge-danger" style="background: #942a25; color: #fff;padding:10px; font-size: 14px">
                                <?php switch ($id){
                                    case 1: echo \common\models\ReportOffense::find()->where(['report_id'=>$userReports])->count(); break;
                                    case 2: echo \common\models\ReportIjro::find()->where(['report_id'=>$userReports])->count(); break;
                                    case 3: echo \common\models\ReportMurojat::find()->where(['report_id'=>$userReports])->count(); break;
                                    case 4: echo \common\models\ReportAuksion::find()->where(['report_id'=>$userReports])->count(); break;
                                    case 5: echo \common\models\ReportRuxsatnoma::find()->where(['report_id'=>$userReports])->count(); break;
                                    case 6: echo \common\models\ReportUyjoyRuxsatnoma::find()->where(['report_id'=>$userReports])->count(); break;
                                    case 7: echo \common\models\ReportFoydalanishgaQabulqilish::find()->where(['report_id'=>$userReports])->count(); break;
                                } ?>
                            </span>
                        </div>
                    </a>
                <?php endforeach; ?>

                    <a href="<?=\yii\helpers\Url::to(['by-user','cat_id'=>$id])?>" class="col-md-4" style="margin-bottom: 15px;">

                        <div class="btn btn-block btn-primary" style="padding: 20px 0; font-size: 16px; background: #f7fafc;border-color:#e5ebec; color: #333">
                            Umumiy | <span class="badge badge-danger" style="background: #942a25; color: #fff;padding:10px; font-size: 14px">
                                    <?php switch ($id){
                                        case 1: echo \common\models\ReportOffense::find()->where(['report_id'=>$generalReports])->count(); break;
                                        case 2: echo \common\models\ReportIjro::find()->where(['report_id'=>$generalReports])->count(); break;
                                        case 3: echo \common\models\ReportMurojat::find()->where(['report_id'=>$generalReports])->count(); break;
                                        case 4: echo \common\models\ReportAuksion::find()->where(['report_id'=>$generalReports])->count(); break;
                                        case 5: echo \common\models\ReportRuxsatnoma::find()->where(['report_id'=>$generalReports])->count(); break;
                                        case 6: echo \common\models\ReportUyjoyRuxsatnoma::find()->where(['report_id'=>$generalReports])->count(); break;
                                        case 7: echo \common\models\ReportFoydalanishgaQabulqilish::find()->where(['report_id'=>$generalReports])->count(); break;
                                    } ?>
                                </span>
                        </div>
                    </a>

            </div>
        </div>
    </div>
</div>


