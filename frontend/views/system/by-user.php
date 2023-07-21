<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php if(!empty($user_id)): ?>
                <h2 class="btn btn-info btn-lg" style="margin-bottom: 10px;"><?=\common\models\SiteUser::findOne($user_id)->username?></h2>
            <?php else: ?>

                <h2 class="btn btn-info btn-lg" style="margin-bottom: 10px;"> Umumiy </h2>

            <?php endif; ?>
            <h3><?=Yii::$app->params['report_type'][$doc_type]?></h3>
        </div>
    </div>

</div>

<?php

    switch ($doc_type){

        case $doc_type: echo $this->render('hisobot-'.$doc_type,[
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);

        break;
    }


?>