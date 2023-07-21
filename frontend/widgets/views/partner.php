<!-- Partner Section Start -->
<div id="rs-blog" class="rs-blog blog-main-home bg7 pt-100 pb-100 md-pt-70 md-pb-70 partner">
    <div class="container">
        <div class="sec-title text-center mb-60 md-mb-40">
            <h2 class="title title2">
            <?=Yii::t('main','partners')?>
            </h2>
        </div>
        <div class="partner_block">

            <div class="news_block row ">
                <?php if (!empty($models)) : ?>
                    <?php foreach ($models as $model) : ?>
                    <?php

                    if($model->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'partner/' . $model->id . '/l_' . $model->image )) {

                        $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'partner/' . $model->id . '/l_' .  $model->image;

                    }else{

                        $image = '/images/default/m_post.jpg';

                    }
                    ?>
                        <?php if(!empty($model->getLang('id'))): ?>
                        <div class="col-lg-3">
                            <a href="<?= $model->link?>" class="partner_item" target="_blank">
                                <div class="item_img">
                                    <img src="<?=$image?>" alt="">
                                </div>
                                <div class="item_name"><?=  $model->getLang('title')?></div>
                            </a>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
<!-- Partner Section End -->