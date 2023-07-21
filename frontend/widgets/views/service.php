<!-- Features Area -->
<section class="features-area section-bg" style="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 section-title text-left">
                <h1></i><?=Yii::t('main','service')?></h1>
            </div>
            <?php if (!empty($models)) : ?>
                    <?php foreach ($models as $model) : ?>
                    <?php if(!empty($model->getLang('id'))): ?>
                        <div class="col-lg-4 col-md-4 col-12">
                            <!-- Single Feature -->
                            <div class="single-feature"><!--class="active" -->
                                <div class="icon-head" style="margin-bottom: 15px;"><i class="<?=$model->icon?>"></i></div>
                                <!-- <h4><a href="#">Creative Design</a></h4> -->
                                <p><?=$model->getLang('name')?></p>
                                <div class="button">
                                    <a href="<?=$model->link?>" target="_blank" class="normal-btn"><i class="fa fa-arrow-circle-o-right"></i></i><?=Yii::t('main','more_info')?></a>
                                </div>
                            </div>
                            <!--/ End Single Feature -->
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<!--/ End Features Area -->