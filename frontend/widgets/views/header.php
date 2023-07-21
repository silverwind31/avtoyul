<?php

use common\models\Menu;

function renderMenu($id){

    $out = '';
    $menu = Menu::find()->where('status=1')->andWhere(['id' => $id, 'type' => 0])->one();
    $_query = Menu::find()->where('status=1')->andWhere(['parent' => $id, 'type' => 0]);

    if( $_query->exists() )
    {
        $out .= '<li class="menu-item-has-children"><a href="#">';
        $out .= $menu->title . '</a>';
        $out .= '<ul class="sub-menu">';
        $items = $_query->orderBy(['order_by' => SORT_ASC])->all();
        foreach ($items as $item){
            $out .= renderMenu($item->id);
        }

        $out .= '</ul></li>';

    } else {

        $out .= '<li><a href="' .$menu->url. '">';
        $out .= $menu->title.'</a></li>';

    }


    return $out;
}

    $lang = Yii::$app->session->get('lang');
    if (empty($lang)){
        $lang = Yii::$app->language;
    }

?>

<!--Full width header Start-->
<div class="full-width-header">
    <!--Header Start-->
    <header id="rs-header" class="rs-header header-transparent">
        <!-- Topbar Area Start -->
        <div class="topbar-area style1">
            <div class="container custom">
                <div class="row y-middle">
                    <div class="col-lg-12">
                        <div class="topbar-contact d-flex justify-content-between">
                            <ul>
                                <li class="symbol">
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?= Yii::t('main','site_boards')?>">
                                        <img src="/img/sitemap.png" alt="">
                                    </a>
                                </li>
                                <li class="symbol">
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" title=" <?= Yii::t('main','flag')?>">
                                        <img src="/img/gerb-small.png" alt="">
                                    </a>
                                </li>
                                <li class="symbol">
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?= Yii::t('main','coat')?>">
                                        <img src="/img/flag.png" alt="">
                                    </a>
                                </li>
                                <li class="symbol">
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?= Yii::t('main','gymn')?>">
                                        <img src="/img/madhiya.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <i class="flaticon-email"></i>
                                    <a href="<?=\common\models\Settings::findOne('email')->getLang('val')?>"><?=\common\models\Settings::findOne('email')->getLang('val')?></a>
                                </li>
                                <li>
                                    <i class="flaticon-call"></i>
                                    <a href="tel:<?=\common\models\Settings::findOne('phone')->getLang('val')?>"> <?=\common\models\Settings::findOne('phone')->getLang('val')?></a>
                                </li>
                                <li>
                                    <i class="flaticon-location"></i>
                                    <?=\common\models\Settings::findOne('address')->getLang('val')?>
                                </li>
                            </ul>

                            <ul>
                                <li class="languages">
                                    <div class="dropdown">
                                        <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="/img/<?=$lang?>.png" alt=""> <?=\common\models\Languages::findOne(['abb'=>$lang])->abb?>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <?php foreach ($langs as $language): ?>
                                                <li>
                                                    <a class="dropdown-item" href="<?=\yii\helpers\Url::to(['site/lang','lang'=>$language->abb ])?>"><img src="/img/<?=$language->abb?>.png" alt=""> <?=$language->abb?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-eye"></i></a>
                                </li>
                                <li class="search-parent">
                                    <a class="hidden-xs rs-search" data-bs-toggle="modal" data-bs-target="#searchModal" href="#">
                                        <i class="flaticon-search"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar Area End -->

        <!-- Menu Start -->
        <div class="menu-area menu-sticky">
            <div class="container custom">
                <div class="row-table">
                    <div class="col-cell header-logo">
                        <div class="logo-area">
                            <a href="<?=\yii\helpers\Url::Home()?>">
                                <div class="normal-logo">
                                    <img src="/img/gerb.png" alt=""><span><?=\common\models\Settings::findOne('title')->getLang('val')?></span>
                                </div>
                                <div class="sticky-logo">
                                    <img src="/img/gerb.png" alt=""><span><?=\common\models\Settings::findOne('title')->getLang('val')?></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-cell">
                        <div class="rs-menu-area">
                            <div class="main-menu">
                                <nav class="rs-menu hidden-md">
                                    <ul class="nav-menu">

                                        <?php

                                        foreach ($models as $model) {

                                            echo renderMenu( $model->id );

                                        }

                                        ?>

                                    </ul> <!-- //.nav-menu -->
                                </nav>
                            </div> <!-- //.main-menu -->
                        </div>
                    </div>
                    <div class="col-cell">
                        <div class="expand-btn-inner">
                            <ul>

                                <li class="humburger">
                                    <a id="nav-expander" class="nav-expander bar" href="#">
                                        <div class="bar">
                                            <span class="dot1"></span>
                                            <span class="dot2"></span>
                                            <span class="dot3"></span>
                                            <span class="dot4"></span>
                                            <span class="dot5"></span>
                                            <span class="dot6"></span>
                                            <span class="dot7"></span>
                                            <span class="dot8"></span>
                                            <span class="dot9"></span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->

        <!-- Canvas Menu start -->
        <nav class="right_menu_togle hidden-md">
            <div class="close-btn">
                <a id="nav-close" class="nav-close">
                    <div class="line">
                        <span class="line1"></span>
                        <span class="line2"></span>
                    </div>
                </a>
            </div>
            <div class="canvas-logo">
                <a href="<?=\yii\helpers\Url::Home()?>"><img src="/images/gerb.png" alt="logo"></a>
            </div>
            <div class="offcanvas-text">
                <p><?=\common\models\Settings::findOne('title')->getLang('val')?></p>
            </div>
            <div class="media-img">
                <img src="/images/off2.jpg" alt="img">
            </div>
            <div class="canvas-contact">
                <div class="address-area">
                    <div class="address-list">
                        <div class="info-icon">
                            <i class="flaticon-location"></i>
                        </div>
                        <div class="info-content">
                            <h4 class="title"><?=Yii::t('main','address')?></h4>
                            <em><?=\common\models\Settings::findOne('address')->getLang('val')?></em>
                        </div>
                    </div>
                    <div class="address-list">
                        <div class="info-icon">
                            <i class="flaticon-email"></i>
                        </div>
                        <div class="info-content">
                            <h4 class="title"><?=Yii::t('main','email')?></h4>
                            <em><a href="mailto:<?=\common\models\Settings::findOne('email')->getLang('val')?>"><?=\common\models\Settings::findOne('email')->getLang('val')?></a></em>
                        </div>
                    </div>
                    <div class="address-list">
                        <div class="info-icon">
                            <i class="flaticon-call"></i>
                        </div>
                        <div class="info-content">
                            <h4 class="title"><?=Yii::t('main','phone')?></h4>
                            <em><?=\common\models\Settings::findOne('phone')->getLang('val')?></em>
                        </div>
                    </div>
                </div>
                <ul class="social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                </ul>
            </div>
        </nav>
        <!-- Canvas Menu end -->

        <!-- Canvas Mobile Menu start -->
        <nav class="right_menu_togle mobile-navbar-menu" id="mobile-navbar-menu">
            <div class="close-btn">
                <a id="nav-close2" class="nav-close">
                    <div class="line">
                        <span class="line1"></span>
                        <span class="line2"></span>
                    </div>
                </a>
            </div>
            <ul class="nav-menu">
                <?php
                    foreach ($models as $model) {
                        echo renderMenu( $model->id );
                    }
                ?>
            </ul> <!-- //.nav-menu -->
            <div class="canvas-contact">
                <div class="address-area">
                    <div class="address-list">
                        <div class="info-icon">
                            <i class="flaticon-location"></i>
                        </div>
                        <div class="info-content">
                            <h4 class="title"><?=Yii::t('main','address')?></h4>
                            <em><?=\common\models\Settings::findOne('address')->getLang('val')?></em>
                        </div>
                    </div>
                    <div class="address-list">
                        <div class="info-icon">
                            <i class="flaticon-email"></i>
                        </div>
                        <div class="info-content">
                            <h4 class="title"><?=Yii::t('main','email')?></h4>
                            <em><a href="mailto:<?=\common\models\Settings::findOne('email')->getLang('val')?>"><?=\common\models\Settings::findOne('email')->getLang('val')?></a></em>
                        </div>
                    </div>
                    <div class="address-list">
                        <div class="info-icon">
                            <i class="flaticon-call"></i>
                        </div>
                        <div class="info-content">
                            <h4 class="title"><?=Yii::t('main','phone')?></h4>
                            <em><?=\common\models\Settings::findOne('phone')->getLang('val')?></em>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Canvas Menu end -->
    </header>
    <!--Header End-->
</div>
<!--Full width header End-->
