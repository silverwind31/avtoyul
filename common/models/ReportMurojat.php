<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "report_murojat".
 *
 * @property int $id
 * @property string $xudud_nomi
 * @property string $murojat_fish
 * @property string $murojat_date
 * @property string $qabul_qilish_date
 * @property string $rad_qilish_date
 * @property string $rad_sabablari
 * @property int $report_id
 * @property string $report_name
 */
class ReportMurojat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report_murojat';
    }

    public $month;
    public $user_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['murojat_date', 'qabul_qilish_date', 'rad_qilish_date','month','user_id'], 'safe'],
            [['report_id'], 'integer'],
            [['xudud_nomi', 'rad_sabablari'], 'string', 'max' => 500],
            [['murojat_fish'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'xudud_nomi' => 'Xudud nomi (M.F.Y)',
            'murojat_fish' => 'Murojaat etgan shaxsning F.I.Sh (tadbirkorlik subyekti nomi)',
            'murojat_date' => 'Murojaat etgan sana',
            'qabul_qilish_date' => 'Qanoatlantirilgan 
(xokim qarori sanasi va raqami, ajratilgan yer uchastkasining o‘lchami (gektar))',
            'rad_qilish_date' => 'Rad etilgan sanasi',
            'rad_sabablari' => 'Rad etish sabablari',
            'report_id' => 'Report ID',
            'month' => 'Ой'
        ];
    }

    public static function getCount($user_id = NULL, $month_id = NULL){

        $reports  = [];
        $count = 0;

        if(!empty($user_id)){

            $reports = ArrayHelper::map(Report::find()->where(['document_type'=>3])->andWhere(['user_id'=>$user_id])->andWhere(['status'=>40])->all(),'id','id');

        }

        if(!empty($month_id)){

            $reports = ArrayHelper::map(Report::find()->where(['document_type'=>3])->andWhere(['month'=>$month_id])->andWhere(['status'=>40])->all(),'id','id');

        }

        if(!empty($user_id) && !empty($month_id)){

            $reports = ArrayHelper::map(Report::find()->where(['document_type'=>3])->andWhere(['user_id'=>$user_id])->andWhere(['status'=>40])->andWhere(['month'=>$month_id])->all(),'id','id');

        }

        $count = ReportMurojat::find()->where(['report_id' => $reports])->count();

        return $count;

    }
}
