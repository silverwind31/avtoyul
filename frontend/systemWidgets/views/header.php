<!-- ===== Top-Navigation ===== -->
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <a class="navbar-toggle font-20 hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">
            <i class="fa fa-bars"></i>
        </a>
        <div class="top-left-part">
            <a class="logo" href="<?=\yii\helpers\Url::to('/system')?>">
                <b>
                    <img src="/img/gerb-small.png" alt="home" />
                </b>
                <span> Surxondaryo Viloyat Qurilish Bosh boshqarmasi</span>
            </a>
        </div>
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li>
                <a href="<?=\yii\helpers\Url::home()?>"> <i class="icon-home"></i> Saytga qaytish </a>
            </li>
            <li>
                <a href="#"> <i class="icon-user"></i> <?=$user->username?> </a>
            </li>
            <li>
                <a href="<?=\yii\helpers\Url::to(['user/logout'])?>"> <i class="icon-logout"></i> Chiqish </a>
            </li>
        </ul>
    </div>
</nav>
<!-- ===== Top-Navigation-End ===== -->
<!-- ===== Left-Sidebar ===== -->
<!--<aside class="sidebar">-->
<!--    <div class="scroll-sidebar">-->
<!--        <nav class="sidebar-nav">-->
<!--            <ul id="side-menu">-->
<!--                <li>-->
<!--                    <a href="--><?//=\yii\helpers\Url::to('/system')?><!--" class="waves-effect"><i class="icon-home"></i> <span class="hide-menu"> Asosiy </span></a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a class="waves-effect" href="javascript:void(0);" ><i class="icon-chart"></i> <span class="hide-menu"> Hisobotlar </span></a>-->
<!--                    <ul aria-expanded="false" class="collapse">-->
<!--                        <li> <a href="index-2.html">Modern Version</a> </li>-->
<!--                        <li> <a href="index2.html">Clean Version</a> </li>-->
<!--                        <li> <a href="index3.html">Analytical Version</a> </li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </nav>-->
<!--    </div>-->
<!--</aside>-->
<!-- ===== Left-Sidebar-End ===== -->