
<div class="col-lg-4 pr-40 md-pr-15 md-mb-50">

    <div class="cat_block">
        <div class="categories">
            <div class="widget-title">
                <h3 class="title"><?= Yii::t('main','documents')?></h3>
            </div>
            <ul>
                <?php if (!empty($models)) : ?>
                    <?php foreach ($models as $model) : ?>

                        <?php if(!empty($model->getLang('id'))): ?>
                            <li><a href="<?=yii\helpers\Url::to(['documents/by-cat','id'=>$model->id])?>"><?=$model->getLang('name')?></a></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>

</div>