<?php
use common\models\Menu;

function renderFooterMenu($id)
{

    $out = '';

    //$menu = Menu::find()->where('status=1')->andWhere(['id' => $id, 'type' => 0])->one();
    $menus = Menu::find()->where('status=1','parent=12')->andWhere(['type'=>1])->andWhere(['id' => $id])->all();

    foreach ($menus as $menu) {
        $out .= '<li>';
        $out .= '<a href="' . $menu->url . '">' . $menu->title . '</a>';

        if ($menu->type)

            $out .= '</li>';
    }

    return $out;
}

 ?>

<!-- Footer Start -->
<footer id="rs-footer" class="rs-footer style1">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 md-mb-10">
                    <div class="footer-logo mb-40">
                        <img src="/images/gerb.png" alt=""><span><?=\common\models\Settings::findOne('title')->getLang('val')?></span>
                    </div>
                    <div class="textwidget white-color pb-40"><p><?=\common\models\Settings::findOne('copyright')->getLang('val')?></p>
                    </div>
                    <ul class="footer-social md-mb-30">
                        <li>
                            <a href="#" target="_blank"><span><i class="fa fa-facebook"></i></span></a>
                        </li>
                        <li>
                            <a href="# " target="_blank"><span><i class="fa fa-twitter"></i></span></a>
                        </li>

                        <li>
                            <a href="# " target="_blank"><span><i class="fa fa-pinterest-p"></i></span></a>
                        </li>
                        <li>
                            <a href="# " target="_blank"><span><i class="fa fa-instagram"></i></span></a>
                        </li>

                    </ul>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 md-mb-10 pl-55 md-pl-15">
                    <h3 class="footer-title"> <?=Yii::t('main','footer_service')?> </h3>
                    <ul class="site-map">
                        <?php
                        foreach ($models as $model) {
                            echo renderMenu( $model->id );
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 md-mb-10">
                    <h3 class="footer-title"> <?=Yii::t('main','footer_connect')?></h3>
                    <ul class="address-widget">
                        <li>
                            <i class="flaticon-location"></i>
                            <div class="desc"><?=\common\models\Settings::findOne('title')->getLang('val')?></div>
                        </li>
                        <li>
                            <i class="flaticon-call"></i>
                            <div class="desc">
                                <a href="tel:<?=\common\models\Settings::findOne('phone')->getLang('val')?>"><?=\common\models\Settings::findOne('phone')->getLang('val')?></a>
                            </div>
                        </li>
                        <li>
                            <i class="flaticon-email"></i>
                            <div class="desc">
                                <a href="mailto:<?=\common\models\Settings::findOne('email')->getLang('val')?>"><?=\common\models\Settings::findOne('email')->getLang('val')?></a>
                            </div>
                        </li>
                        <li>
                            <i class="flaticon-clock-1"></i>
                            <div class="desc">
                                <?=\common\models\Settings::findOne('time_table')->getLang('val')?>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->

<!-- start scrollUp  -->
<div id="scrollUp" class="orange-color">
    <i class="fa fa-angle-up"></i>
</div>
<!-- End scrollUp  -->


