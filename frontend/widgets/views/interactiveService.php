<!-- Services -->
<section class="services">
    <div class="rs-services style2 rs-services-style2 gray-bg pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container custom">

            <div class="sec-title text-center mb-60 md-mb-40">
                <h2 class="title title2">
                    <?=Yii::t('main','interactive_service')?>
                </h2>
            </div>

            <div class="row">

                <?php if(!empty($models)): ?>
                <?php foreach($models as $model): ?>
                        <?php

                        if($model->main_image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'publicservices/' . $model->id . '/l_' . $model->main_image )) {

                            $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'publicservices/' . $model->id . '/l_' .  $model->main_image;

                        }else{

                            $image = '/images/default/m_post.png';

                        }
                        ?>
                        <?php if(!empty($model->getLang('id'))): ?>

                            <div class="col-lg-3 col-md-6 mb-20">
                                <a href="<?=$model->link?>" class="service-wrap">
                                    <div class="image-part">
                                        <img src="<?=$image?>" alt="">
                                    </div>
                                    <div class="content-part">
                                        <h3 class="title"><?=$model->getLang('name')?></h3>
                                    </div>
                                </a>
                            </div>

                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>