<?php    $this->title = \common\components\StaticFunctions::getSettings('title') . " - " . $model->getLang('title');?><div class="breadcrumbs bread-blog">    <div class="container">        <div class="row">            <div class="col-12">                <div class="bread-inner">                    <!-- Bread Menu -->                    <div class="bread-menu">                        <ul>                            <li><a href="<?=\yii\helpers\Url::Home()?>"><?=Yii::t('main','home')?></a></li>                            <li><a><?=$model->getLang('title')?></a></li>                        </ul>                    </div>                </div>            </div>        </div>    </div></div><!-- / End Breadcrumb --><!-- Content --><div class="page-content bg-gray">    <div class="section-full content-inner">        <div class="container">            <div class="row">                <!-- left part start -->                <div class="col-lg-8 col-md-12 m-b30">                    <h2 class="m-t0 m-b10 font-28 title text-black" style="text-align: center"><br><?=$model->getLang('title')?><br><br></h2>                    <div class="row">                        <div class="col-lg-12">                            <!-- Tabs -->                            <div class="course-details dlab-tabs border-top bg-tabs">                                <div class="tab-content">                                    <div id="description" class="tab-pane active">                                        <p><?=\common\components\StaticFunctions::kcfinder($model->getLang('body'))?></p>                                    </div>                                </div>                            </div>                        </div>                    </div>                </div>                <!-- left part start -->                <?= frontend\widgets\Sidebar::widget();?>            </div>        </div>    </div>    <?= frontend\widgets\Partner::widget();?></div><!-- Content END-->