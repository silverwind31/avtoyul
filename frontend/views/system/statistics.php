<?php if($user->getRank() == 1): ?>
    <?php

    $categoriesSum[0] = 0;
    $categoriesSum[1] = 0;
    $categoriesSum[2] = 0;
    $categoriesSum[3] = 0;
    $categoriesSum[4] = 0;
    $categoriesSum[5] = 0;
    $categoriesSum[6] = 0;

    ?>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="panel-heading">
                    <h2>Umumiy hisobotlar</h2>
                </div>

                <?php if(!empty($allUsers)): ?>

                    <div style="display: flex; justify-content: space-between; width: 100%; align-items: center">

                        <h1>Blankalar kategoriyalari va Tumanlar bo'yicha</h1>

                        <div class="text-right">
                            <a href="<?=\yii\helpers\Url::to(['/system/export-main'])?>" style="" class="btn btn-lg btn-success"><i class="fa fa-file-excel-o"></i> Excell</a>
                        </div>

                    </div>

                    <table class="table table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tuman</th>
                                <?php foreach (Yii::$app->params['report_type'] as $type): ?>
                                    <th><?=$type?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach ($allUsers as $item): ?>
                                <tr>
                                    <th><?=$i++?></th>
                                    <th><?=$item->username?></th>
                                    <td><?=\common\models\ReportOffense::getCount($item->id)?></td>
                                    <td><?=\common\models\ReportIjro::getCount($item->id)?></td>
                                    <td><?=\common\models\ReportMurojat::getCount($item->id)?></td>
                                    <td><?=\common\models\ReportAuksion::getCount($item->id)?></td>
                                    <td><?=\common\models\ReportRuxsatnoma::getCount($item->id)?></td>
                                    <td><?=\common\models\ReportUyjoyRuxsatnoma::getCount($item->id)?></td>
                                    <td><?=\common\models\ReportFoydalanishgaQabulqilish::getCount($item->id)?></td>
                                </tr>
                                <?php
                                    $categoriesSum[0] += \common\models\ReportOffense::getCount($item->id);
                                    $categoriesSum[1] += \common\models\ReportIjro::getCount($item->id);
                                    $categoriesSum[2] += \common\models\ReportMurojat::getCount($item->id);
                                    $categoriesSum[3] += \common\models\ReportAuksion::getCount($item->id);
                                    $categoriesSum[4] += \common\models\ReportRuxsatnoma::getCount($item->id);
                                    $categoriesSum[5] += \common\models\ReportUyjoyRuxsatnoma::getCount($item->id);
                                    $categoriesSum[6] += \common\models\ReportFoydalanishgaQabulqilish::getCount($item->id);
                                ?>
                            <?php endforeach; ?>
                            <tr>
                                <th class="text-center" colspan="2">Jami</th>
                                <?php foreach($categoriesSum as $cat): ?>
                                    <th class="text-center"><?=$cat?></th>
                                <?php endforeach; ?>
                            </tr>
                        </tbody>
                    </table>
                <?php endif; ?>

            </div>
        </div>
    </div>
<?php else: ?>

    <?php
    $categoriesSum[0] = 0;
    $categoriesSum[1] = 0;
    $categoriesSum[2] = 0;
    $categoriesSum[3] = 0;
    $categoriesSum[4] = 0;
    $categoriesSum[5] = 0;
    $categoriesSum[6] = 0;

    ?>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="panel-heading">
                    <h2>Umumiy hisobotlar</h2>
                </div>

                <?php if(!empty($allUsers)): ?>
                    <h1>Blankalar kategoriyalari va Oylar bo'yicha</h1>

                    <table class="table table-striped table-bordered text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Oy</th>
                            <?php foreach (Yii::$app->params['report_type'] as $type): ?>
                                <th class="text-center"><?=$type?></th>
                            <?php endforeach; ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; foreach (Yii::$app->params['month']['uz'] as $month_number => $month): ?>
                            <tr>
                                <th><?=$i++?></th>
                                <th><?=$month?></th>
                                <td><?=\common\models\ReportOffense::getCount($user->id, $month_number)?></td>
                                <td><?=\common\models\ReportIjro::getCount($user->id, $month_number)?></td>
                                <td><?=\common\models\ReportMurojat::getCount($user->id, $month_number)?></td>
                                <td><?=\common\models\ReportAuksion::getCount($user->id, $month_number)?></td>
                                <td><?=\common\models\ReportRuxsatnoma::getCount($user->id, $month_number)?></td>
                                <td><?=\common\models\ReportUyjoyRuxsatnoma::getCount($user->id, $month_number)?></td>
                                <td><?=\common\models\ReportFoydalanishgaQabulqilish::getCount($user->id, $month_number)?></td>
                            </tr>
                            <?php
                            $categoriesSum[0] += \common\models\ReportOffense::getCount($user->id, $month_number);
                            $categoriesSum[1] += \common\models\ReportIjro::getCount($user->id, $month_number);
                            $categoriesSum[2] += \common\models\ReportMurojat::getCount($user->id, $month_number);
                            $categoriesSum[3] += \common\models\ReportAuksion::getCount($user->id, $month_number);
                            $categoriesSum[4] += \common\models\ReportRuxsatnoma::getCount($user->id, $month_number);
                            $categoriesSum[5] += \common\models\ReportUyjoyRuxsatnoma::getCount($user->id, $month_number);
                            $categoriesSum[6] += \common\models\ReportFoydalanishgaQabulqilish::getCount($user->id, $month_number);
                            ?>
                        <?php endforeach; ?>
                        <tr>
                            <th class="text-center" colspan="2">Jami</th>
                            <?php foreach($categoriesSum as $cat): ?>
                                <th class="text-center"><?=$cat?></th>
                            <?php endforeach; ?>
                        </tr>
                        </tbody>
                    </table>
                <?php endif; ?>

            </div>
        </div>
    </div>
<?php endif; ?>