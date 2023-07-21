<?php

$this->title = \common\components\StaticFunctions::getSettings('title') . " - " . \common\models\NewsCategory::findOne($model->category)->getLang('name') . "-" . $model->getLang('title');


use frontend\widgets\Boards; ?>
<?php
if($model->main_image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'news/' . $model->id . '/l_' . $model->getLang('main_image') )) {

    $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'news/' . $model->id . '/l_' .  $model->getLang('main_image');

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
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs" style="background-image: url('/img/1.jpg');">
    <div class="container">
        <div class="breadcrumbs-inner">
            <h1 class="page-title"><?=$model->getLang('title')?></h1>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- Blog Section Start -->
<div class="rs-inner-blog pt-100 pb-100 md-pt-70 md-pb-70">
    <div class="container custom">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=\yii\helpers\Url::Home()?>"><?=Yii::t('main','home')?></a></li>
                <li class="breadcrumb-item"><a href="<?=yii\helpers\Url::to(['news/view-all'])?>"><?=Yii::t('main','all-news')?></a></li>
                <li class="breadcrumb-item"><a href="<?=yii\helpers\Url::to(['news/by-cat','id'=>$model->category])?>"><?=\common\models\NewsCategory::findOne($model->category)->getLang('name')?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$model->getLang('title')?></li>
            </ol>
        </nav>

        <div class="row">

            <?= frontend\widgets\Sidebar::widget();?>

            <div class="col-lg-8 pr-35 md-pr-15 md-mt-50">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-details">
                            <div class="blog-full">
                                <ul class="single-post-meta">
                                    <li>
                                        <span class="p-date"><i class="fa fa-calendar-check-o"></i> <?= $model->event_date?></span>
                                    </li>
                                    <li class="Post-cate">
                                        <div class="tag-line">
                                            <i class="fa fa-book"></i>
                                            <a href="<?=yii\helpers\Url::to(['news/by-cat','id'=>$category->id])?>"><?=\common\models\NewsCategory::findOne($model->category)->getLang('name')?></a>
                                        </div>
                                    </li>
                                </ul>
                                <p>
                                    <?= $model->getLang('body')?>
                                </p>
                                <img src="<?= $image ?>" class="mb-30" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Blog Section End -->


