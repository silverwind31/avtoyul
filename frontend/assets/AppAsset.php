<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{    
    
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "styles/bootstrap.min.css",

        "fonts/flaticon.css",
        "styles/font-awesome.min.css",
        "styles/animate.css",
        "styles/owl.carousel.css",
        "styles/off-canvas.css",
        "styles/magnific-popup.css",
        "styles/rsmenu-main.css",
        "styles/rs-spacing.css",

        "styles/style.css",
        "styles/responsive.css",
        "styles/custom.css",
    ];

    public $js = [

        "js/jquery.min.js",
        "js/modernizr-2.8.3.min.js",
//        "js/jquery.min.js",
//        "js/bootstrap.min.js", # buni esa yoq
        "js/bootstrap.bundle.min.js", # buni ishlatamiz
        "js/jquery.nav.js",
        "js/isotope.pkgd.min.js",
        "js/owl.carousel.min.js",
        "js/wow.min.js",
        "js/skill.bars.jquery.js",
        "js/imagesloaded.pkgd.min.js",
        "js/waypoints.min.js",
        "js/jquery.counterup.min.js",
        "js/jquery.magnific-popup.min.js",
        "js/contact.form.js",

        "js/main.js",
    ];

      public $depends = [
//          'yii\web\yiiAsset',
          'yii\web\JqueryAsset'
      ];

}
