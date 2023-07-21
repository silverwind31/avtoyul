<?php



use yii\widgets\LinkPager;



$this->title = \common\components\StaticFunctions::getSettings('title') . " - " .Yii::t('main', 'all-projects');



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

                            <li><a href="<?=\yii\helpers\Url::Home()?>"><?=Yii::t('main','home')?></a></li>

                            <li><a ><?=Yii::t('main','all-projects')?></a></li>



                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- / End Breadcrumb -->



<!-- Blog Layout -->

<section class="blog-layout news-default section-space">

    <div class="container">

        <div class="row ">

            <?php if (!empty($models)) : ?>

                    <?php foreach ($models as $model) : ?>

                    <?php



                        if($model->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'project/' . $model->id . '/l_' . $model->image )) {



                            $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'project/' . $model->id . '/l_' .  $model->image;



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

                    <div class="col-lg-4 col-md-6 col-12">

                        <!-- Single Blog -->

                        <div class="single-news ">

                            <div class="news-head overlay">

                                <img src="<?=$image?>" alt="#">

                                <ul class="news-meta">

<!--                                    <li class="author"><a href="--><?//=yii\helpers\Url::to(['projects/by-cat','id'=>$model->category])?><!--"><i class="fa fa-hacker-news"></i></i>--><?//=\common\models\ProjectCategory::findOne($model->category)->name ?><!--</a></li>-->

                                    <li class="date"><i class="fa fa-calendar"></i><?= Yii::$app->params['month'][$lang][$monthNumber]; ?> <?= date('d', strtotime($date)); ?>, <?= date('Y', strtotime($model->created_date)); ?></li>



                                </ul>

                            </div>

                            <div class="news-body">

                                <div class="news-content">

                                    <h3 class="news-title"><a href="<?=yii\helpers\Url::to(['projects/view','id'=>$model->id])?>"><?= \common\components\StaticFunctions::getPartOfText($model->getLang('name'),100) ?></a></h3>

                                    <div class="news-text"><p><?= \common\components\StaticFunctions::getPartOfText($model->getLang('description'),200) ?></p></div>

                                    <a href="<?=yii\helpers\Url::to(['projects/view','id'=>$model->id])?>" class="more"><?=Yii::t('main','more_info')?><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>

                                </div>

                            </div>

                        </div>

                        <!--/ End Single Blog -->

                    </div>

                    <?php endif; ?>

                <?php endforeach; ?>

            <?php endif; ?>

            <!-- Pagination start -->

            <div class="col-lg-12 col-md-12">

                <div class="pagination-area">

                    <?php echo LinkPager::widget(['pagination' => $pagination]);?>

                </div>

            </div>

            <!-- Pagination END -->

        </div>



    </div>

</section>



<?= frontend\widgets\Partner::widget();?>





