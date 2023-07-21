<!-- Portfolio -->
<section class="portfolio section-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-12">
                <div class="section-title default text-center">
                    <div class="section-top">
                        <h1><b><?=Yii::t('main','projects')?></b></h1>
                    </div>
                    <div class="section-bottom">
                        <div class="text">
                            <p><?=Yii::t('main','ready_projects')?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="portfolio-main">

                    <div id="portfolio-item" class="portfolio-item-active">
                        <?php if (!empty($models)) : ?>
                            <?php foreach ($models as $model) : ?>
                            <?php

                            if($model->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'project/' . $model->id . '/l_' . $model->image )) {

                                $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'project/' . $model->id . '/l_' .  $model->image;

                            }else{

                                $image = '/images/default/m_post.png';

                            }
                            ?>
                            <?php if(!empty($model->getLang('id'))): ?>
                                <div class="cbp-item">

                                    <!-- Single Portfolio -->

                                    <div class="single-portfolio">
                                        <div class="portfolio-head overlay">
                                            <img src="<?=$image?>" alt="<?=$model->getLang('name')?>">
                                            <a class="more" href="<?=yii\helpers\Url::to(['projects/view','id'=>$model->id])?>"><i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                        <div class="portfolio-content">
                                            <p><a href="<?=yii\helpers\Url::to(['projects/view','id'=>$model->id])?>"><?=$model->getLang('name')?></a></p>
                                        </div>
                                    </div>

                                    <!--/ End Single Portfolio -->

                                </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-12 text-center">
                            <button style="margin-top: 20px;padding: 15px 15px; border-radius: 10px; background-color: green;color: #fff;"><a href="<?=yii\helpers\Url::to(['projects/view-all'])?>" class="optional-btn btn-succes"><?=Yii::t('main','all-projects')?></a></button>
                        </div>
        </div>
    </div>
</section>
<!--/ End Portfolio -->