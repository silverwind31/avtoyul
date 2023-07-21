<?php

use frontend\widgets\Sidebar;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = \common\components\StaticFunctions::getSettings('title') . " - " . Yii::t('main', 'all-news');

?>

<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs" style="background-image: url('/img/1.jpg');">
    <div class="container">
        <div class="breadcrumbs-inner">
            <h1 class="page-title">
                <?=Yii::t('main','search-result')?>
            </h1>
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
                <li class="breadcrumb-item active" aria-current="page"><?=Yii::t('main','search-result')?></li>
            </ol>
        </nav>

        <div class="row">

            <?= frontend\widgets\Sidebar::widget();?>

            <div class="col-lg-8 pr-35 md-pr-15 md-mt-50">
                <h3><?=Yii::t('main','search-result')?> soni : <?=count($results)?> </h3>
                <div class="row">
                    <?php if (!empty($results)) : ?>
                        <?php foreach ($results as $model) : ?>
                            <?php

                            if($model->main_image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'news/' . $model->id . '/l_' . $model->getLang('main_image') )) {

                                $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'news/' . $model->id . '/l_' .  $model->getLang('main_image');

                            }else{

                                $image = '/images/default/m_post.jpg';

                            }
                            ?>
                            <?php if(!empty($model->getLang('id'))): ?>
                                <?php
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
                                <div class="col-lg-6 col-md-6 col-12">
                                    <!-- Single Blog -->
                                    <div class="single-news ">
                                        <div class="news-head overlay">
                                            <img src="<?=$image?>" alt="#">
                                            <ul class="news-meta">
                                                <li class="author"><a href="<?=yii\helpers\Url::to(['news/by-cat','id'=>$category->id])?>"><i class="fa fa-hacker-news"></i></i><?=\common\models\NewsCategory::findOne($model->category)->getLang('name')?></a></li>
                                                <li class="date"><i class="fa fa-calendar"></i><?= Yii::$app->params['month'][$lang][$monthNumber]; ?> <?= date('d', strtotime($date)); ?>, <?= date('Y', strtotime($model->event_date)); ?></li>
                                                <li class="view"><i class="fa fa-eye"></i><?=$model->seen_count?></li>
                                            </ul>
                                        </div>
                                        <div class="news-body">
                                            <div class="news-content">
                                                <h3 class="news-title"><a href="<?=yii\helpers\Url::to(['news/view','id'=>$model->id])?>"><?= \common\components\StaticFunctions::getPartOfText($model->title,50) ?></a></h3>
                                                <div class="news-text"><p><?= \common\components\StaticFunctions::getPartOfText($model->body,100) ?></p></div>
                                                <a href="<?=yii\helpers\Url::to(['news/view','id'=>$model->id])?>" class="more"><?=Yii::t('main','more_info')?><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ End Single Blog -->
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Blog Section End -->

