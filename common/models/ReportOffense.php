<?php

namespace common\models;

use common\components\Model;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "report_offense".
 *
 * @property int $id
 * @property string $building_owner
 * @property string $building_name
 * @property string $doc_number_date
 * @property string $tribunal_info
 * @property string $commission_xabarnoma
 * @property string $commission_davo
 * @property string $problem_solve
 * @property string $illegal_order
 * @property string $legal_order
 * @property int $report_id
 * @property string $created_date
 * @property string $update_date
 * @property int $user_id
 */
class ReportOffense extends Model
{
    /**
     * {@inheritdoc}
     */
    public $month;
    public $user_id;

    public static function tableName()
    {
        return 'report_offense';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes'=>[
                    ActiveRecord::EVENT_BEFORE_INSERT =>['created_date','update_date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE =>['update_date'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['report_id', 'created_date', 'update_date', 'user_id'], 'required'],
            [['report_id', 'user_id'], 'integer'],
            [['created_date', 'update_date','month'], 'safe'],
            [['building_owner', 'building_name', 'doc_number_date', 'tribunal_info', 'commission_xabarnoma', 'commission_davo', 'problem_solve', 'illegal_order', 'legal_order'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'building_owner' => 'Aniqlangan noqonuniy qurilish egasi nomi',
            'building_name' => 'Qurilish nomi',
            'doc_number_date' => 'Tuman qurilish bo‘limi tomonidan aniqlangan qurilishni rasmiylashtirish bo‘yicha tuzilgan xujjat rakami va sanasi',
            'tribunal_info' => 'Aniqlangan noqonuniy qurilishning 15 kunlik muddatda bartaraf etilganligi yoki mulk huquqi bo‘yicha sudga murojaati to‘g‘risida ma’lumot',
            'commission_xabarnoma' => 'Tuman hokimligi xuzuridagi yer uchastkalarini berish masalalrini ko‘rib chiquvchi komiissiyaga kiritilgan habarnoma sanasi va raqami',
            'commission_davo' => 'Tuman hokimligi xuzuridagi yer uchastkalarini berish masalalrini ko‘rib chiquvchi komiissiya tomonidan sudga kiritilgan da’vo arizasi sanasi va raqami',
            'problem_solve' => 'Noqonuniy qurilishning bartaraf etilganligi',
            'illegal_order' => 'Majburiy tartibda buzish bo‘yicha Sudning qarori mavjudligi',
            'legal_order' => 'Sud tomonidan mulk xukuki etirof etilganligi',
            'report_id' => 'Report ID',
            'created_date' => 'Created Date',
            'update_date' => 'Update Date',
            'user_id' => 'User ID',
            'month' => 'Ой'
        ];
    }

    public static function getCount($user_id = NULL, $month_id = NULL){

        $reports  = [];
        $count = 0;

        if(!empty($user_id)){

            $reports = ArrayHelper::map(Report::find()->where(['document_type'=>1])->andWhere(['user_id'=>$user_id])->andWhere(['status'=>40])->all(),'id','id');

        }

        if(!empty($month_id)){

            $reports = ArrayHelper::map(Report::find()->where(['document_type'=>1])->andWhere(['month'=>$month_id])->andWhere(['status'=>40])->all(),'id','id');

        }

        if(!empty($user_id) && !empty($month_id)){

            $reports = ArrayHelper::map(Report::find()->where(['document_type'=>1])->andWhere(['user_id'=>$user_id])->andWhere(['status'=>40])->andWhere(['month'=>$month_id])->all(),'id','id');

        }

        $count = ReportOffense::find()->where(['report_id' => $reports])->count();

        return $count;

    }
}
