<?php

$this->title = \common\components\StaticFunctions::getSettings('title') ;


?>
<?php
//if($model->main_image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'news/' . $model->id . '/l_' . $model->getLang('main_image') )) {
//
//    $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'news/' . $model->id . '/l_' .  $model->getLang('main_image');
//
//} else {
//
//    $image = '/images/default/m_post.jpg';
//
//}
//
//?>
<!-- Breadcrumb -->
<div class="breadcrumbs overlay" style="background-image:url('/img/breadcrumb.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <!-- Bread Menu -->
                    <div class="bread-menu">
                        <ul>
                            <li><a href="<?=\yii\helpers\Url::Home()?>"><?=Yii::t('main','home')?></a></li>
                            <li><a><?=Yii::t('main','all_leaders')?></a></li>
                        </ul>
                    </div>
                    <!-- Bread Title -->
                    <div class="bread-title"><h2><?=Yii::t('main','all_leaders')?></h2></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / End Breadcrumb -->

<section class="blog-layout blog-latest section-space">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-12">
                <div class="row">

            <?php if (!empty($models)) : ?>
                    <?php foreach ($models as $model) : ?>
                    <?php

                    if($model->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'leader/' . $model->id . '/l_' . $model->image )) {

                        $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'leader/' . $model->id . '/l_' .  $model->image;

                    }else{

                        $image = '/images/default/m_post.jpg';

                    }
                    ?>
                    <?php if(!empty($model->getLang('id'))): ?>

                        
                        <div class="col-12">
                            <!-- Single Blog -->
                            <div class="single-news">
                                <div class="news-head overlay">
                                    <span class="news-img" style="background-image:url('<?=$image?>')"></span>
                                    <!--                                <a href="#" class="bizwheel-btn theme-2">Read more</a>-->
                                </div>
                                <div class="news-body">
                                    <div class="news-content">
                                        <h5><?=$model->getLang('position')?></h5>
                                        <hr>
                                        <h4 class="news-title leader-fio" data-id="<?=$model->id?>"><a ><?=$model->getLang('fio')?></a></h4>
                                        <div class="news-text">
                                            <p><?=$model->phone?></p>
                                            <p><?=$model->email?></p>
                                            <p><?=$model->getLang('work_day')?></p>
                                        </div>
                                        <ul class="news-meta">
                                            <li class="date"><!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary leader-opener" data-toggle="modal" data-id="<?=$model->id?>">
                                                    <?=Yii::t('main','read_more')?>
                                                </button>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!--/ End Single Blog -->
                        </div>

                    <?php endif; ?>

                <?php endforeach; ?>

                </div>

            </div>

            <?php endif; ?>
            <?= \frontend\widgets\Sidebar::widget();?>
        </div>
    </div>
</section>




