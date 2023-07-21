<?php

use frontend\widgets\Sidebar;
use yii\helpers\Url;

?>
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs" style="background-image: url('/img/1.jpg');">
    <div class="container">
        <div class="breadcrumbs-inner">
            <h1 class="page-title">
                <?=Yii::t('main','not-found')?>
            </h1>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- Blog Section Start -->
<div class="rs-inner-blog pt-100 pb-100 md-pt-70 md-pb-70">
    <div class="container custom">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=\yii\helpers\Url::Home()?>"><?=Yii::t('main','home')?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=Yii::t('main','not-found')?></li>
            </ol>
        </nav>

        <div class="row">

            <?= frontend\widgets\Sidebar::widget();?>

            <div class="col-lg-8 pr-35 md-pr-15 md-mt-50 text-center">
                <h3><?=Yii::t('main','test')?></h3>
                <div class="img_block">
                    <img src="/images/test.png" alt="">
                </div>

            </div>

        </div>
    </div>
</div>
<!-- Blog Section End -->