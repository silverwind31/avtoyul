<?php

use frontend\widgets\Sidebar;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = \common\components\StaticFunctions::getSettings('title') . " - "  . $category->getLang('name');

?>

<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs" style="background-image: url('/img/1.jpg');">
    <div class="container">
        <div class="breadcrumbs-inner">
            <h1 class="page-title"><?= $category->getLang('name') ?></h1>
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
                <li class="breadcrumb-item active" aria-current="page"><?= $category->getLang('name') ?></li>

            </ol>
        </nav>

        <div class="row">

            <?= frontend\widgets\Sidebar::widget();?>

            <div class="col-lg-8 pr-35 md-pr-15 md-mt-50">
                <div class="row">
                    <?php if (!empty($models)) : ?>
                        <?php foreach ($models as $model) : ?>
                            <?php

                            if($model->main_image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'news/' . $model->id . '/l_' . $model->main_image )) {

                                $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'news/' . $model->id . '/l_' .  $model->main_image;

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
                                <div class="col-lg-6 mb-50">
                                    <div class="blog-item">
                                        <div class="blog-img">
                                            <a href="<?=yii\helpers\Url::to(['news/view','id'=>$model->id])?>"><img src="<?= $image ?>" alt=""></a>
                                            <ul class="post-categories">
                                                <li><a href="<?=yii\helpers\Url::to(['news/by-cat','id'=>$model->category])?>"><?=\common\models\NewsCategory::findOne($model->category)->getLang('name')?></a></li>
                                            </ul>
                                        </div>
                                        <div class="blog-content">
                                            <h3 class="blog-title"><a href="<?=yii\helpers\Url::to(['news/view','id'=>$model->id])?>"><?= \common\components\StaticFunctions::getPartOfText($model->getLang('title'),100) ?></a></h3>
                                            <div class="blog-meta">
                                                <ul class="btm-cate">
                                                    <li>
                                                        <div class="blog-date">
                                                            <i class="fa fa-calendar-check-o"></i> <?=$model->event_date?>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="author">
                                                            <i class="fa fa-eye"></i> <?= $model->seen_count?>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="blog-desc">
                                                <?= \common\components\StaticFunctions::getPartOfText($model->getLang('title'),60) ?>
                                            </div>
                                            <div class="blog-button">
                                                <a class="<?=yii\helpers\Url::to(['news/view','id'=>$model->id])?>" href="<?=yii\helpers\Url::to(['news/view','id'=>$model->id])?>"><?=Yii::t('main','read_more')?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <div class="col-lg-12">
                        <div class="pagination-area">

                            <?php echo LinkPager::widget(['pagination' => $pagination]);?>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Blog Section End -->

