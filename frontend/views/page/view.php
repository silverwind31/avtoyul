<?php

$this->title = \common\components\StaticFunctions::getSettings('title') . " - " . $model->getLang('title');


?>
<?php
if($model->main_image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'page/' . $model->id . '/l_' . $model->getLang('main_image') )) {

    $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'page/' . $model->id . '/l_' .  $model->getLang('main_image');

} else {

    $image = '/images/default/m_post.jpg';

}


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
<div class="breadcrumbs bread-blog">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <!-- Bread Menu -->
                    <div class="bread-menu">
                        <ul>
                            <li><a href="<?=\yii\helpers\Url::Home()?>"><?=Yii::t('main','home')?></a></li>
                            <li><a><?=$model->getLang('title')?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / End Breadcrumb -->

<!-- Blog Single -->
<section class="news-area archive blog-single section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="blog-single-main">
<!--                            <div class="main-image">-->
<!--                                <img  style="width: 60%; margin-left: 150px" src="--><?//=$image?><!--" alt="#">-->
<!--                            </div>-->
                            <div class="blog-detail">

                                <p><?=\common\components\StaticFunctions::kcfinder($model->getLang('body'))?></p>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <?= frontend\widgets\Sidebar::widget();?>


        </div>
    </div>
</section>

<?= frontend\widgets\Partner::widget();?>

<!--/ End Services -->

