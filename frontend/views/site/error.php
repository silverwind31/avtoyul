<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use frontend\widgets\Sidebar;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\SearchForm;

$this->title = nl2br(Html::encode($message));
?>

<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs" style="background-image: url('/img/1.jpg');">
    <div class="container">
        <div class="breadcrumbs-inner">
            <h1 class="page-title">
                <?=Yii::t('main','error')?>
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
                <li class="breadcrumb-item active" aria-current="page"><?=Yii::t('main','error')?></li>
            </ol>
        </nav>

        <div class="row">

            <div class="col-lg-12 pr-35 md-pr-15 md-mt-50 text-center">
                <h3 style="color: red"><?=Yii::t('main','error')?></h3>
                <div class="img_block">
                    <img src="/images/404-error.png" alt="">
                </div>

            </div>

        </div>
    </div>
</div>
<!-- Blog Section End -->