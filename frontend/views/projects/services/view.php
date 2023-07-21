<?php

$this->title = \common\components\StaticFunctions::getSettings('title') . " - " . $model->getLang('name');


?>
<?php
if($model->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'project/' . $model->id . '/l_' . $model->image )) {

    $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'project/' . $model->id . '/l_' .  $model->image;

} else {

    $image = '/images/default/m_post.jpg';

}


$monthNumber = '';
if (!empty($model->event_date)) {
    $monthNumber = date('m', strtotime($model->event_date));
    $monthNumber *= 1;
    $date = $model->event_date;
} else {
    $monthNumber = date('m', strtotime($model->created_date));
    $monthNumber *= 1;
    $date = $model->created_date;
}
$lang = Yii::$app->session->get('lang');
if (empty($lang)) {
    $lang = Yii::$app->language;
}

?>
<!-- Breadcrumb -->
<div class="breadcrumbs overlay" style="background-image:url('/img/breadcrumb.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <!-- Bread Menu -->
                    <div class="bread-menu">
                        <ul>
                            <li><a href="<?=\yii\helpers\Url::Home()?>"> <?=Yii::t('main','home')?></a></li>
                            <li><a href="<?=yii\helpers\Url::to(['projects/view-all'])?>"> <?=Yii::t('main','all-projects')?></a></li>
                        </ul>
                    </div>
                    <div class="bread-title"><h2><?=$model->getLang('name')?></h2></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / End Breadcrumb -->

<!-- Portfolio Details -->
<section class="pf-details  section-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <!-- Portfolio Image -->
                <div class="project-head">
                    <img src="<?=$image?>" alt="<?=$model->getLang('name')?>">
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <!-- Project Info -->
                <div class="portfolio-meta">
                    <ul>
                        <li><i class="fa fa-user"></i><span><?=Yii::t('main','project_name')?></span> <b><?=$model->getLang('name')?></b></li>
                        <li><i class="fa fa-tag"></i><span><?=Yii::t('main','project_category')?></span> <b><a href="<?=yii\helpers\Url::to(['projects/by-cat','id'=>$model->category])?>"><?= \common\models\ProjectCategory::findOne($model->category)->getLang('name')?></a></b></li>
                        <li><i class="fa fa-calendar"></i><span><?=Yii::t('main','project_date')?></span> <b><?= date('d', strtotime($date)); ?> - <?= Yii::$app->params['month'][$lang][$monthNumber]; ?>, <?= date('Y', strtotime($model->created_date)); ?></b></li>
                        <li><i class="fa fa-map-marker"></i><span><?=Yii::t('main','project_address')?></span> <b><?=$model->getLang('address')?></b></li>
                        <li><i class="fa fa-file"></i><span><?=Yii::t('main','project_file')?></span> <b><?=$model->file?></b></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Portfolio Content -->
                <div class="single-content">
                    <h1><?=$model->getLang('name')?></h1>
                    <p><?=$model->getLang('description')?></p>

                </div>
                <!--/ End Portfolio Cotnent -->
            </div>
        </div>
    </div>
</section>
<!--/ End Portfolio Details -->

<?= frontend\widgets\Partner::widget();?>

<!--/ End Services -->

