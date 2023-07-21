<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = \common\components\StaticFunctions::getSettings('title') . " - " . "Tizimga Kirish";

?>

<div class="breadcrumbs bread-blog">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <!-- Bread Menu -->
                    <div class="bread-menu">
                        <ul>
                            <li><a href="<?=\yii\helpers\Url::Home()?>"><?=Yii::t('main','home')?></a></li>
                            <li><a class="active" href="#">Tizimga Kirish</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="news-area archive blog-single section-padding">

    <div class="container">

        <div class="row">

            <div class="col-md-6 mr-auto ml-auto">

                <div class="contact-form-area service">
                    <h3>Tizimga Kirish</h3>
                    <!-- Service Form -->
                    <?php

                    $form = ActiveForm::begin([
                        'enableClientValidation' => true,
                        'enableAjaxValidation' => true,
                        'options'=>[
                            'id' => 'login-form',
                        ],
                    ]); ?>

                    <div class="form-group">

                        <?= $form->field($model, 'username')->textInput()->label("Login") ?>

                    </div>

                    <div class="form-group">

                        <?= $form->field($model, 'password')->passwordInput()->label("Parol") ?>

                    </div>

                    <div class="form-group mb-0 text-center">

                        <?= Html::submitButton("Kirish", ['class' => 'btn btn-primary btn-block', 'id' => 'submit-btn']) ?>

                    </div>

                    <?php ActiveForm::end(); ?>
                    <!--/ End Service Form -->
                </div>

            </div>

        </div>

    </div>

</section>