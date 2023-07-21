<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\widgets\ActiveForm;
use yii\web\View;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Surxondaryo viloyat avtomobil yo'llari bosh boshqarmasi">
    
<!--    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">-->
<!--    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">-->
<!--    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">-->
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    
    <title><?= Html::encode($this->title) ?></title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

    <?= Html::csrfMetaTags() ?>

    <?php $this->head() ?>

</head>

<body class="defult-home">

    <?php $this->beginBody() ?>

    <!-- Boxed Layout -->
        <div class="offwrap"></div>

        <!--Preloader start here-->
        <div id="pre-load">
            <div id="loader" class="loader">
                <div class="loader-container">
                    <div class='loader-icon'><img src="/images/intersection.png" alt="Bizup Consulting Business"></div>
                    <div class="loader_text">Surxondaryo viloyat avtomobil yo'llari bosh boshqarmasi</div>
                </div>
            </div>
        </div>
        <!--Preloader area end here-->

        <!-- Main content Start -->

        <div class="main-content">

            <?= \frontend\widgets\Header::widget();?>

            <?= $content;?>

        </div>

        <?= \frontend\widgets\Footer::widget();?>

    <!-- End Boxed Layout -->


    <?php $this->endBody() ?>

    <!-- Search Modal Start -->
    <div class="modal fade search-modal" id="searchModal" tabindex="-1">
        <button type="button" class="close" data-bs-dismiss="modal">
            <span class="flaticon-cross"></span>
        </button>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="search-block clearfix">
                    <form>
                        <div class="form-group">
                            <input class="form-control" placeholder="Search Here..." type="text">
                            <button type="submit" value="Search"><i class="flaticon-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Modal End -->

</body>

</html>

<?php $this->endPage() ?>
