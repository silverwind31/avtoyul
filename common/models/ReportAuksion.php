<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "report_auksion".
 *
 * @property int $id
 * @property string $auksion_address
 * @property string $foydalanish_maqsadi
 * @property string $maydoni
 * @property string $auksion_loyihasi
 * @property string $xulosa_date
 * @property int $xulosa_number
 * @property string $xulosa_mazmuni
 * @property string $rad_sababi
 * @property string $topshirish_sanasi
 * @property int $topshirish_number
 * @property string $savdo_golibi
 * @property int $report_id
 */
class ReportAuksion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report_auksion';
    }

    public $month;
    public $user_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['xulosa_date', 'topshirish_sanasi','month','user_id'], 'safe'],
            [['xulosa_number', 'topshirish_number', 'report_id'], 'integer'],
            [['auksion_address', 'foydalanish_maqsadi', 'auksion_loyihasi', 'rad_sababi'], 'string', 'max' => 500],
            [['maydoni'], 'string', 'max' => 100],
            [['xulosa_mazmuni', 'savdo_golibi'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auksion_address' => '"E-ijro" auksion savdosiga chiqarilgan yer uchastkasi manzili',
            'foydalanish_maqsadi' => 'Foydalanish maqsadi',
            'maydoni' => 'Maydoni (ga)',
            'auksion_loyihasi' => '"E-ijro" auksion savdosiga chiqarilgan yer uchastkasi joylashgan xududning bosh rejasi yoki APOT loyixasi mavjudligi',
            'xulosa_date' => 'Bo‘lim tomonidan berilgan xulosa sanasi',
            'xulosa_number' => 'Bo‘lim tomonidan berilgan xulosa raqami',
            'xulosa_mazmuni' => 'Xulosa mazmuni (rad yoki ijobiy)',
            'rad_sababi' => 'Rad etilgan bo‘lsa sababi (xujjatlar to‘liq emas, muxofaza zonalarda joylashgan, SHNQ talablariga zid)',
            'topshirish_sanasi' => 'Bosh boshqarma tomonidan berilgan Me’moriy rejalashtirish topshirig‘i sanasi',
            'topshirish_number' => 'Bosh boshqarma tomonidan berilgan Me’moriy rejalashtirish topshirig‘i raqami',
            'savdo_golibi' => 'Aniqlangan savdo g‘olibi',
            'report_id' => 'Report ID',
            'month' => 'Ой'
        ];
    }

    public static function getCount($user_id = NULL, $month_id = NULL){

        $reports  = [];
        $count = 0;

        if(!empty($user_id)){

            $reports = ArrayHelper::map(Report::find()->where(['document_type'=>4])->andWhere(['user_id'=>$user_id])->andWhere(['status'=>40])->all(),'id','id');

        }

        if(!empty($month_id)){

            $reports = ArrayHelper::map(Report::find()->where(['document_type'=>4])->andWhere(['month'=>$month_id])->andWhere(['status'=>40])->all(),'id','id');

        }

        if(!empty($user_id) && !empty($month_id)){

            $reports = ArrayHelper::map(Report::find()->where(['document_type'=>4])->andWhere(['user_id'=>$user_id])->andWhere(['month'=>$month_id])->andWhere(['status'=>40])->all(),'id','id');

        }


        $count = ReportAuksion::find()->where(['report_id' => $reports])->count();

        return $count;

    }
}
