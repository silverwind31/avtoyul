<?php

use yii\widgets\LinkPager;

$this->title = \common\components\StaticFunctions::getSettings('title') . " - " . $category->getLang('name');

?>

<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs img10" style="background: url(/images/breadcrumbs/inr_10.jpg);">
    <div class="container">

        <div class="breadcrumbs-inner">
            <h1 class="page-title">
                <?=$category->getLang('name')?>
            </h1></div>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- Faq Section Start -->
<div id="rs-faq" class="rs-faq pt-100 pb-100 md-pt-70 md-pb-70">
    <div class="container documents">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=\yii\helpers\Url::Home()?>"><?=Yii::t('main','home')?></a></li>
                <li class="breadcrumb-item"><a href="<?=yii\helpers\Url::to(['documents/view-all'])?>"><?=Yii::t('main','all-documents')?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$category->getLang('name')?></li>
            </ol>
        </nav>

        <div class="row y-middle">

            <div class="col-lg-8 pl-30 md-pl-15">
                <div class="faq-content documents_accordion">
                    <div id="accordion" class="accordion">
                        <?php if (!empty($models)) : ?>
                            <?php foreach ($models as $model) : ?>
                            <?php if(!empty($model->getLang('id'))): ?>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapse<?=$model->id?>" aria-expanded="true"><i class="fa fa-file-text"></i> <?= \common\components\StaticFunctions::getPartOfText($model->getLang('name'),200) ?></a>
                                    </div>
                                    <div id="collapse<?=$model->id?>" class="collapse" data-bs-parent="#accordion">
                                        <div class="card-body">
                                            <p><?= $model->getLang('description')?></p>
                                            <?php if(!empty($model->link)): ?>

                                            <a href="<?=$model->link ?>"><i class="fa fa-external-link"></i> <?=Yii::t('main','source')?></a>

                                            <?php endif; ?>

                                            <?php

                                            if($model->file && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'document/' . $model->id . '/' . $model->file )) {

                                                $file = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'document/' . $model->id . '/' .  $model->file;

                                            }

                                            ?>

                                            <?php if(!empty($file)): ?>

                                                <a target="_blank" href="<?=$file?>" class="btn btn-success"><i class="fa fa-download"></i> <?=Yii::t('main','dowloand_document')?> </a>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                            <?php endforeach; ?>

                        <?php endif; ?>

                    </div>
                </div>
            </div>

            <?= frontend\widgets\DocumentsSidebar::widget();?>

        </div>
    </div>
</div>
<!-- Faq Section End -->



