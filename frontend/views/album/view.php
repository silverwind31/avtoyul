<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = \common\components\StaticFunctions::getSettings('title') . " - ". Yii::t('main','albums') . " - " . $album->getLang('name');

$js = <<<JS
    $('.albums-page-box').magnificPopup({
        delegate: 'a',
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: false,
        gallery: {
            enabled: true
        }
    });
JS;

$this->registerJs($js);


?>

<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs img7">
    <div class="container">
        <div class="breadcrumbs-inner">
            <h1 class="page-title">
                Portfolio Three
            </h1>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- Project Section Start -->
<div class="rs-project style3 pt-100 pb-100 md-pt-70 md-pb-70">
    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=\yii\helpers\Url::Home()?>"><?=Yii::t('main','home')?></a></li>
                <li class="breadcrumb-item"><a href="<?=\yii\helpers\Url::to('album/index')?>"><?=$album->getLang('name')?></a></li>

                <li class="breadcrumb-item active" aria-current="page"><?=Yii::t('main','albums')?></li>
            </ol>
        </nav>

        <div class="row">

            <?php if (!empty($models)) : ?>
                <?php

                foreach($models as $model):


                if($model->guid && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'album/' . $model->album . '/m_' . $model->guid ))
                {
                    $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'album/' . $model->album . '/l_' . $model->guid;

                } else {

                    $image = '/images/default/l_post.jpg';

                }

                ?>

                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="project-item">
                            <div class="project-img">
                                <a href="<?=$image?>"><img src="<?=$image?>" alt="images" class="image-link"></a>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>

            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Project Section End -->
