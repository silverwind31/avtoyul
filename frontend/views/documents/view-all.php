<?php

use yii\widgets\LinkPager;

$this->title = \common\components\StaticFunctions::getSettings('title') . " - " .Yii::t('main', 'all-projects');

?>

<!-- Breadcrumb -->
<div class="breadcrumbs overlay" style="background-image:url('/img/breadcrumb.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <!-- Bread Menu -->
                    <div class="bread-menu">
                        <ul>
                            <li><a href="<?=\yii\helpers\Url::Home()?>"><?=Yii::t('main','home')?></a></li>
                            <li><a ><?=Yii::t('main','all-projects')?></a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / End Breadcrumb -->

<!-- Service Single -->
<section class="service-single section-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <!-- Service Image -->
                <div class="service-img">
                    <img src="img/services/service-single.jpg" alt="#">
                </div>
                <!-- Service Content -->
                <div class="service-content">
                    <h2>Digital Marketing Solution</h2>
                    <p>Female is firmament made land don’t good behold yielding morning hathe seas unto. So first fill shall damn creeping. Seed he was that moveth bearing. Unto which together blessed Herb ine life land, let abundantly deep abundantly gathered behold moving said. Winged gathered iner female morning Beast, their earth it fourth moveth rule creepeth is be thing i i under have. Second to lights all second. Saw their. Rule. Own air greater. Creeping them firmament frui creepeth is be thing i i under</p>
                    <p>Female is firmament made land don’t good behold yielding morning hathe seas unto. So first fill shall damn creeping. Seed he was that moveth bearing. Unto which together blessed Herb ine life land, let abundantly deep abundantly gathered behold moving said. Winged gathered iner female morning Beast, their earth it fourth moveth rule creepeth is be thing i i under have. Second to lights all second.</p>
                    <div class="row service-space">
                        <div class="col-lg-6 col-md-6 col-12">
                            <!-- Service Feature -->
                            <div class="small-list-feature">
                                <h3>We provide you innovation</h3>
                                <p>Female is firmament made land don't good behold yielding morning hathe seas unto. their earth it fourth moveth rule</p>
                                <ul>
                                    <li><i class="fa fa-check"></i>We provide you creative servicce</li>
                                    <li><i class="fa fa-check"></i>Just awesome trending way</li>
                                    <li><i class="fa fa-check"></i>Just awesome trending way</li>
                                    <li><i class="fa fa-check"></i>Creative service is most important</li>
                                    <li><i class="fa fa-check"></i>99% Server Up-time gurantee</li>
                                    <li><i class="fa fa-check"></i>24/7 live support</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <!-- Service Img -->
                            <div class="modern-img-feature">
                                <img src="img/services/service-small.jpg" alt="#">
                                <div class="video-play">
                                    <a href="https://www.youtube.com/watch?v=RLlPLqrw8Q4" class="video video-popup mfp-iframe"><i class="fa fa-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>Female is firmament made land don’t good behold yielding morning hathe seas unto. So first fill shall damn creeping. Seed he was that moveth bearing. Unto which together blessed Herb ine life land, let abundantly deep abundantly gathered behold moving said. Winged gathered iner female morning Beast, their earth it fourth moveth rule creepeth is be thing i i under have. Second to lights all second.</p>
                </div>
            </div>

            <?= frontend\widgets\DocumentsSidebar::widget();?>

        </div>
    </div>
</section>
<!--/ End Services -->

<?= frontend\widgets\Partner::widget();?>


