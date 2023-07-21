<div class="breadcrumbs bread-blog">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <!-- Bread Menu -->
                    <div class="bread-menu">
                        <ul>
                            <li><a href="<?=\yii\helpers\Url::Home()?>"><?=Yii::t('main','home')?></a></li>
                            <li><a><?=$model->getLang('title')?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / End Breadcrumb -->

<section class="service-single section-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <!-- Service Content -->
                <div class="service-content">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Tuman/Shahar</th>
                                <td><?=$model->district->name?></td>
                            </tr>
                            <tr>
                                <th>Bosh arxitektor</th>
                                <td><?=$model->leader?></td>
                            </tr>
                            <tr>
                                <th>Telefon raqam</th>
                                <td><?=$model->phone?></td>
                            </tr>
                            <tr>
                                <th>E-mail</th>
                                <td><?=$model->email?></td>
                            </tr>
                            <tr>
                                <th>Manzil</th>
                                <td><?=$model->address?></td>
                            </tr>

                        </tbody>
                    </table>
                    <div class="leader-info">
                        <?=\common\components\StaticFunctions::kcfinder($model->leader_info)?>
                    </div>

                    <div class="branch-location">
                        <h3 class="mb-3 mt-3">Xaritadan joylashuv</h3>
                        <?=$model->map_link?>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-12">
                <!-- Service Sidebar -->
                <div class="service-sidebar">
                    <!-- Single Sidebar -->
                    <div class="service-single-sidebar widget">
                        <h2 class="widget-title"> Viloyat hududiy bo'linmalar </h2>
                        <div class="menu-service-menu-container">
                            <!-- Service Menu -->
                            <ul id="menu-service-menu" class="menu">
                                <?php if(!empty($branches)): ?>
                                <?php foreach ($branches as $branch): ?>
<!--                                    <li><a href="--><?//=\yii\helpers\Url::to(['tuman/','bulinma' => $branch->slug])?><!--">--><?//=$branch->district->name?><!--</a></li>-->
                                    <li><a href="www.surxondaryoavtoyul.uz">www.surxondaryoavtoyul.uz</a></li>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/ End Service Sidebar -->
            </div>
        </div>
    </div>
</section>