<?php

use yii\widgets\LinkPager;

$this->title = \common\components\StaticFunctions::getSettings('title') . " - " . Yii::t('main','albums') ;

?>

<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs img8" style="background: url(/images/breadcrumbs/inr_8.jpg);">
    <div class="container">
        <div class="breadcrumbs-inner">
            <h1 class="page-title">
                <?= Yii::t('main','albums') ?>
            </h1>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- Project Section Start -->
<div class="rs-project style4 pt-100 pb-100 md-pt-70 md-pb-70">
    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=\yii\helpers\Url::Home()?>"><?=Yii::t('main','home')?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=Yii::t('main','albums')?></li>
            </ol>
        </nav>

        <div class="row">

            <?php if (!empty($models)) : ?>
                <?php foreach ($models as $model): ?>

                <?php

                $imageModel = \common\models\Image::find()->where(['status'=>1,'album'=>$model->id])->limit(1)->one();

                if($imageModel->guid && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'album/' . $imageModel->album . '/m_' . $imageModel->guid ))
                {
                    $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'album/' . $imageModel->album . '/l_' . $imageModel->guid;

                } else {

                    $image = '/images/default/l_post.jpg';

                }

                ?>
                    <?php if (!empty($model->getLang('id'))): ?>

                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="project-item">
                            <div class="project-img">
                                <a href="<?=\yii\helpers\Url::to(['album/view','id'=>$model->id])?>"><img src="<?=$image?>" alt="images"></a>
                            </div>
                            <div class="project-content">
                                <span class="category"><a href="<?=\yii\helpers\Url::to(['album/view','id'=>$model->id])?>"><?=$model->created_date?></a></span>
                                <h3 class="title"><a href="<?=\yii\helpers\Url::to(['album/view','id'=>$model->id])?>"><?=$model->getLang('name')?></a></h3>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>

            <?php endif; ?>

        </div>
    </div>
</div>
<!-- Project Section End -->
