<div class="col-lg-4 col-12">
    <!-- Blog Sidebar -->
    <div class="blog-sidebar">
        <!-- Single Sidebar -->
        <div class="single-sidebar blog_search">
            <?php $form = \yii\widgets\ActiveForm::begin([
                'id' => 'checkout-form',
                'enableAjaxValidation' => false,
                'enableClientValidation' => true,
                'action' => '/site/search'
            ]); ?>
            <form class="searchform" action="#">
                <?= $form->field($search, 'text',[
                    'template' => "{input}",
                ])->textInput(['placeholder'=>Yii::t('main','search'),'class'=>'form-control'])->label(false) ?>
                <button type="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
            </form>
            <?php \yii\widgets\ActiveForm::end()?>
        </div>
        <!--/ End Single Sidebar -->

        <!-- News Tags -->
        <div class="single-sidebar tagcloud">
            <h2 class="sidebar-title"><?=Yii::t('main','projects_cat')?></h2>

            <?php if (!empty($categories)): ?>
                <ul>
                    <?php foreach ($categories as $category): ?>
                        <?php if(!empty($category->getLang('id'))): ?>
                            <li><a href="<?=yii\helpers\Url::to(['projects/by-cat','id'=>$category->id])?>"><?=$category->getLang('name')?></a></li>
                        <?php endif;?>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <!--/ End News Tags -->

        <!-- News Sidebar -->
        <div class="single-sidebar bizwheel_latest_news_widget">
            <h2 class="sidebar-title"><?=Yii::t('main','top_news')?></h2>
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
                    <!-- Single News -->
                    <div class="single-f-news">
                        <div class="post-thumb"><a href="<?=yii\helpers\Url::to(['projects/view','id'=>$model->id])?>"><img src="<?=$image?>" alt="#"></a></div>
                        <div class="content">
                            <p class="post-meta"><time class="post-date"><i class="fa fa-clock-o"></i> <?= Yii::$app->params['month'][$lang][$monthNumber]; ?> <?= date('d', strtotime($date)); ?>, <?= date('Y', strtotime($model->created_date)); ?></time></p>
                            <h4 class="title"><a href="<?=yii\helpers\Url::to(['projects/view','id'=>$model->id])?>"><?= \common\components\StaticFunctions::getPartOfText($model->name,100) ?></a></h4>
                        </div>
                    </div>
                    <!--/ End Single News -->
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <!--/ End Single Sidebar -->

    </div>
    <!--/ End Blog Sidebar -->
</div>