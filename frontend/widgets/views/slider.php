<!-- Slider -->
<section class="main_slider">
    <div class="container custom">
        <div class="slider_block owl-carousel">
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

                    <div class="slider_item" style="background-image: url('<?=$image?>');">
                        <div class="slider_text"><?= \common\components\StaticFunctions::getPartOfText($model->getLang('anons'),200) ?></div>
                        <div class="slider_action">
                            <a href="#" class="readon consultant orange-slide"><?=Yii::t('main','read_more')?></a>
                        </div>
                    </div>

                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
</section>