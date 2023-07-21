
<div class="col-lg-4 col-md-12 order-last">
    <div class="widget-area">

        <div class="search-widget mb-50">
            <div class="search-wrap">

                <?php $form = \yii\widgets\ActiveForm::begin([
                    'id' => 'checkout-form',
                    'enableAjaxValidation' => false,
                    'enableClientValidation' => true,
                    'action' => '/site/search'
                ]); ?>
                    <form action="search#orm">
<!--                        <input type="search" placeholder="" name="s" class="search-input" value="">-->
                        <?= $form->field($search, 'text',[
                            'template' => "{input}",
                        ])->textInput(['placeholder'=>Yii::t('main','search'),'class'=>'search-input'])->label(false) ?>
                        <button type="submit" value="Search"><i class="flaticon-search"></i></button>
                    </form>
                <?php \yii\widgets\ActiveForm::end()?>

            </div>
        </div>

        <div class="recent-posts mb-50">

            <div class="widget-title">
                <h3 class="title">So'ngi yangiliklar</h3>
            </div>
            <?php use yii\helpers\Url;

            if (!empty($models)) : ?>
                <?php foreach ($models as $model) : ?>
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
                        <div class="recent-post-widget no-border">
                            <div class="post-img">
                                <a href="<?=yii\helpers\Url::to(['news/view','id'=>$model->id])?>"><img src="<?= $image ?>" alt=""></a>
                            </div>
                            <div class="post-desc">
                                <a href="<?=yii\helpers\Url::to(['news/view','id'=>$model->id])?>"><?= \common\components\StaticFunctions::getPartOfText($model->getLang('title'),60) ?></a>
                                <span class="date-post"> <i class="fa fa-calendar"></i> <?= $model->event_date ?> </span>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>

        <div class="categories">

            <div class="widget-title">
                <h3 class="title">Mavzular</h3>
            </div>
            <?php if (!empty($categories)): ?>
                <ul>
                    <?php foreach ($categories as $category): ?>

                        <li><a href="<?=yii\helpers\Url::to(['news/by-cat','id'=>$category->id])?>"><?= $category->getLang('name')?></a></li>

                    <?php endforeach; ?>
                </ul>
            <?php endif;?>
        </div>
    </div>
</div>