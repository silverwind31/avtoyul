<div class="col-md-3">
    <div class="panel panel-primary">
        <div class="panel-heading"> Amallar ro'yxati</div>
        <div class="panel-wrapper collapse in" aria-expanded="true">
            <div class="panel-body">
                <ul class="list-group">
                    <?php if($user->rank == 1): ?>
                        <li class="list-group-item"><a href="<?=\yii\helpers\Url::to(['system/create-report'])?>" class="send-request"><i class="fa fa-plus-square"></i> Hisobot blankasi yaratish</a></li>
                    <?php endif; ?>
                    <li class="list-group-item"><a href="<?=\yii\helpers\Url::to(['system/index'])?>"><i class="fa fa-home"></i> Asosiy oynaga qaytish</a></li>
                    <li class="list-group-item"><a href="<?=\yii\helpers\Url::to(['system/all-reports'])?>"> <i class="fa fa-database"></i> Barcha Blankalar</a></li>
                    <li class="list-group-item"><a href="<?=\yii\helpers\Url::to(['system/accepted'])?>"><i class="fa fa-check"></i> Qabul qilinganlar</a></li>
                    <li class="list-group-item"><a href="<?=\yii\helpers\Url::to(['system/declined'])?>"><i class="fa fa-frown-o"></i> Tahrirga qaytganlar</a></li>
                    <li class="list-group-item"><a href="<?=\yii\helpers\Url::to(['system/statistics'])?>"><i class="fa fa-bar-chart-o"></i> Umumiy hisobotlar</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php if($user->rank == 1): ?>

        <div class="panel panel-primary">
            <div class="panel-heading"> Hisobotlar ro'yxati</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <ul class="list-group">
                        <?php foreach (Yii::$app->params['report_type'] as $key => $item): ?>
                            <li class="list-group-item"><a href="<?=\yii\helpers\Url::to(['system/hisobot','id'=>$key])?>"><i class="fa fa-arrow-down"></i> <?=$item?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

    <?php else: ?>

        <div class="panel panel-primary">
            <div class="panel-heading"> Hisobotlar ro'yxati</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <ul class="list-group">
                        <?php foreach (Yii::$app->params['report_type'] as $key => $item): ?>
                            <li class="list-group-item"><a href="<?=\yii\helpers\Url::to(['system/by-user','cat_id'=>$key])?>"><i class="fa fa-arrow-down"></i> <?=$item?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

    <?php endif; ?>
</div>