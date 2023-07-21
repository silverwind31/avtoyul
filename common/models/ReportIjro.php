<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "report_ijro".
 *
 * @property int $id
 * @property string $send_date
 * @property string $send_number
 * @property string $report_name
 * @property int $deadline
 * @property string $responsible_man
 * @property string $position
 * @property string $execution_state
 * @property int $report_id
 */
class ReportIjro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report_ijro';
    }

    public $month;
    public $user_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['send_date','month','user_id'], 'safe'],
            [['deadline', 'report_id'], 'integer'],
            [['send_number', 'report_name', 'responsible_man', 'position', 'execution_state'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'send_date' => "Xujjatning yuborilgan sa'nasi",
            'send_number' => 'Xujjatning yuborilgan raqami',
            'report_name' => 'Xujjat nomi (xat, topshiriq, bayon, qaror, farmoyish) va Hujjatning qisqacha mazmuni',
            'deadline' => 'Bajarilish muddati',
            'responsible_man' => 'Mas’ul ijrochi',
            'position' => 'Lavozimi',
            'execution_state' => 'Ijro holati',
            'report_id' => 'Report ID',
            'month' => 'Ой'
        ];
    }

    public static function getCount($user_id = NULL, $month_id = NULL){

        $reports  = [];
        $count = 0;

        if(!empty($user_id)){

            $reports = ArrayHelper::map(Report::find()->where(['document_type'=>2])->andWhere(['user_id'=>$user_id])->andWhere(['status'=>40])->all(),'id','id');

        }

        if(!empty($month_id)){

            $reports = ArrayHelper::map(Report::find()->where(['document_type'=>2])->andWhere(['month'=>$month_id])->andWhere(['status'=>40])->all(),'id','id');

        }

        if(!empty($user_id) && !empty($month_id)){

            $reports = ArrayHelper::map(Report::find()->where(['document_type'=>2])->andWhere(['user_id'=>$user_id])->andWhere(['month'=>$month_id])->andWhere(['status'=>40])->all(),'id','id');

        }

        $count = ReportIjro::find()->where(['report_id' => $reports])->count();

        return $count;

    }
}
