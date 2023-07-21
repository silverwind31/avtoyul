<div class="content-block">
    <!-- Portfolio  -->
    <div class="section-full content-inner portfolio bg-gray" id="portfolio">
        <div class="container">
            <div class="section-head text-center">
                <h2 class="title"><?=Yii::t('main','gallery')?></h2>
            </div>
            <div class="clearfix" id="lightgallery">

                <ul id="masonry" class="portfolio-ic dlab-gallery-listing gallery-grid-4 gallery lightgallery">
                    <?php if (!empty($models)) : ?>

                        <?php foreach ($models as $imageModel): ?>

                        <?php



                        if($imageModel->guid && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'album/' . $imageModel->album . '/l_' . $imageModel->guid ))
                        {
                            $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'album/' . $imageModel->album . '/l_' . $imageModel->guid;

                        } else {

                            $image = '/images/default/m_post.png';

                        }

                        ?>

                        <li class="web design card-container col-lg-4 col-md-6 col-sm-6">
                            <div class="dlab-box dlab-gallery-box">
                                <div class="dlab-media dlab-img-overlay1 dlab-img-effect">
                                    <a href="<?=$image?>"> <img src="<?=$image?>"  alt=""> </a>
                                    <div class="overlay-bx">
                                        <div class="overlay-icon">
                                            <div class="text-white">
                                                <span data-exthumbimage="<?=$image?>" data-src="<?=$image?>" class="check-km" title="<?=$imageModel->name?>">
                                                                        <i class="fa fa-picture-o icon-bx-xs"></i>
                                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </div>
</div>