<?php

use yii\helpers\Url;

?>
<!-- Blog Section Start -->
<div id="rs-blog" class="rs-blog blog-main-home bg7 pt-100 pb-100 md-pt-70 md-pb-70">
    <div class="container">
        <div class="sec-title text-center mb-60 md-mb-40">
            <h2 class="title title2">
                <?=Yii::t('main','last_news')?>
            </h2>
        </div>
        <div class="news_block row">
            <?php if (!empty($models)) : ?>
                <?php foreach ($models as $model) : ?>
                <?php

                if($model->main_image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'news/' . $model->id . '/l_' . $model->main_image )) {

                    $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'news/' . $model->id . '/l_' .  $model->main_image;

                }else{

                    $image = '/images/default/m_post.png';

                }
                ?>
                    <?php if(!empty($model->getLang('id'))): ?>

                        <div class="col-lg-4">
                            <div class="blog-item">
                                <div class="image-wrap">
                                    <a href="<?=yii\helpers\Url::to(['news/view','id'=>$model->id])?>"><img src="<?=$image?>" alt="Blog"></a>
                                </div>
                                <div class="blog-content">
                                    <ul class="blog-meta">
                                        <li class="date"><?=$model->event_date?></li>
                                        <li class="admin"><a href="<?=yii\helpers\Url::to(['news/by-cat','id'=>$model->category])?>"><?=\common\models\NewsCategory::findOne($model->category)->getLang('name')?></a></li>
                                    </ul>
                                    <h3 class="blog-title"><a href="<?=yii\helpers\Url::to(['news/view','id'=>$model->id])?>"><?= \common\components\StaticFunctions::getPartOfText($model->getLang('title'),100) ?></a></h3>
                                    <p class="desc"><?= \common\components\StaticFunctions::getPartOfText($model->getLang('anons'),200) ?></p>
                                    <div class="blog-btn">
                                        <a class="readon consultant blog" href="<?=yii\helpers\Url::to(['news/view','id'=>$model->id])?>"> <?=Yii::t('main','read_more')?></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
</div>
<!-- Blog Section End -->