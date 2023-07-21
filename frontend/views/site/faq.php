<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Yii::t('main', 'FAQ');

$js = <<<JS

    var submited = false;

    $('#faq-form').on('beforeSubmit', function(event, jqXHR, settings) 
    {
        var form = $(this);
        if( form.find('.has-error').length ) 
        {
            return false;
        }
        
        if (submited == false )
        {
            submited = true;
            
            $('#submit-btn').attr('disabled', true);
    
            $.ajax({
                url: '/site/faq-form',
                type: 'POST',
                data: form.serialize(),
                success: function(data) 
                {
                    if( data['success'] == true )
                    {
                        form[0].reset();
                        $('#faq-modal').iziModal('close');
                        $('#success-modal').iziModal('open');
                        $('#submit-btn').attr('disabled', false);
                        
                    }
                        
                    submited = false;
                }
            });
            
        }

        return false;
        
    }).on('submit', function(e)
    {
        e.preventDefault();
    });
   
JS;

$this->registerJs($js);

?>

<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs img10" style="background: url(/images/breadcrumbs/inr_10.jpg)">
    <div class="container">
        <div class="breadcrumbs-inner">
            <h1 class="page-title">
                <?=Yii::t('main','faq')?>
            </h1> </div>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- Faq Section Start -->
<div id="rs-faq" class="rs-faq pt-100 pb-100 md-pt-70 md-pb-70">
    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=\yii\helpers\Url::Home()?>"><?=Yii::t('main','home')?></a></li>

                <li class="breadcrumb-item active" aria-current="page"><?=Yii::t('main','faq')?></li>
            </ol>
        </nav>

        <div class="row y-middle">
            <div class="col-lg-12 pl-30 md-pl-15">
                <div class="faq-content">
                    <div id="accordion" class="accordion">
                        <?php if (!empty($models)) : ?>
                            <?php foreach ($models as $model) : ?>
                                <?php if(!empty($model->getLang('id'))): ?>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapse<?=$model->id?>" aria-expanded="true"><?=$model->getLang('question')?></a>
                                    </div>
                                    <div id="collapse<?=$model->id?>" class="collapse" data-bs-parent="#accordion">
                                        <div class="card-body">
                                            <?=$model->getLang('answer')?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Faq Section End -->
