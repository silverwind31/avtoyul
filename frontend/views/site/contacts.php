<?php

$this->title = \common\components\StaticFunctions::getSettings('title') . " - " . Yii::t('main','contact');

use yii\helpers\Url;

$lang = Yii::$app->session->get('lang');
if (empty($lang)) {
    $lang = Yii::$app->language;
}

?>

<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs img8" style="background: url(/images/breadcrumbs/inr_8.jpg);">
    <div class="container">
        <div class="breadcrumbs-inner">
            <h1 class="page-title">
                <?=Yii::t('main','contact')?>
            </h1>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- Contact Section Start -->
<div class="rs-contact contact-style2 gray-bg main-home office-modify1 pt-100 pb-100 md-pt-70 md-pb-70">
    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=\yii\helpers\Url::Home()?>"><?=Yii::t('main','home')?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=Yii::t('main','contact')?></li>
            </ol>
        </nav>

        <div class="row margin-0">
            <div class="col-lg-6 padding-0">
                <div class="contact-address">
                    <div class="sec-title mb-46">
                        <h2 class="title pb-20">
                            <?=Yii::t('main','footer_connect')?>
                        </h2>
                        <p class="margin-0"><?=\common\models\Settings::findOne('title')->getLang('val')?></p>
                    </div>
                    <div class="address-item mb-25">
                        <div class="address-icon">
                            <img src="/images/contact/icons/1.png" alt="Address">
                        </div>
                        <div class="address-text">
                            <?=\common\models\Settings::findOne('address')->getLang('val')?>
                        </div>
                    </div>
                    <div class="address-item mb-25">
                        <div class="address-icon">
                            <img src="/images/contact/icons/5.png" alt="Address">
                        </div>
                        <div class="address-text">
                            <a href="tel:<?=\common\models\Settings::findOne('phone')->getLang('val')?>"><?=\common\models\Settings::findOne('phone')->getLang('val')?></a><br>
                        </div>
                    </div>
                    <div class="address-item mb-25">
                        <div class="address-icon">
                            <img src="/images/contact/icons/6.png" alt="Address">
                        </div>
                        <div class="address-text">
                            <a href="mailto:<?=\common\models\Settings::findOne('email')->getLang('val')?>"><?=\common\models\Settings::findOne('email')->getLang('val')?></a><br>
                        </div>
                    </div>
                    <div class="address-item">
                        <div class="address-icon">
                            <img src="/images/contact/icons/7.png" alt="Address">
                        </div>
                        <div class="address-text">
                            <a href="tel:<?=\common\models\Settings::findOne('phone')->getLang('val')?>"><?=\common\models\Settings::findOne('phone')->getLang('val')?></a><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 padding-0">
                <div class="contact-section contact-style2">
                    <div class="sec-title mb-60">
                        <h2 class="title">
                            <?=Yii::t('main','contact_connect')?>
                        </h2>

                    </div>
                    <div class="contact-wrap">
                        <div id="form-messages"></div>

                        <?php $form = \yii\widgets\ActiveForm::begin([
                            'enableClientValidation' => true,
                            'options'=>[
                                'id' => 'contact-form'
                            ]
                        ]); ?>

                            <form>
                                <fieldset>
                                    <div class="row">

                                        <?php if(Yii::$app->session->hasFlash('success')):?>
                                            <div class="col-lg-12 col-md-12 alert alert-success" role="alert"><?=Yii::$app->session->getFlash('success')?></div>
                                        <?php endif;?>

                                        <div class="col-lg-6 col-md-6 col-sm-6 mb-30">
                                            <?= $form->field($model, 'name')->label(Yii::t('main','name')) ?>
<!--                                            <input class="from-control" type="text" id="name" name="name" placeholder="Name" required="">-->
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 mb-30">
                                            <?= $form->field($model, 'email')->label(Yii::t('main','email')) ?>
<!--                                            <input class="from-control" type="text" id="email" name="email" placeholder="E-Mail" required="">-->
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 mb-30">
                                            <?= $form->field($model, 'phone')->label(Yii::t('main','phone')) ?>
<!--                                            <input class="from-control" type="text" id="phone" name="phone" placeholder="Phone Number" required="">-->
                                        </div>

                                        <div class="col-lg-12 mb-35">
                                            <?= $form->field($model, 'body')->label(Yii::t('main','body'))->textarea() ?>
<!--                                            <textarea class="from-control" id="message" name="message" placeholder="Your message Here" required=""></textarea>-->
                                        </div>
                                    </div>
                                    <div class="btn-part">
                                        <div class="form-group mb-0">
                                            <?= \yii\helpers\Html::submitButton('Send', ['class' => 'readon submit', 'id' => 'submit-btn']) ?>
<!--                                            <input class="readon submit" type="submit" value="Submit Now">-->
                                        </div>
                                    </div>
                                </fieldset>
                            </form>

                        <?php \yii\widgets\ActiveForm::end(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Section End -->

