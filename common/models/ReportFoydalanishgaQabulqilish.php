<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "report_foydalanishga_qabulqilish".
 *
 * @property int $id
 * @property string $hudud_name
 * @property string $ruxsatnoma_fish
 * @property string $ruxsatnoma_date
 * @property string $xulosa_date
 * @property int $xulosa_number
 * @property string $natija_ijobiy
 * @property string $natija_rad
 * @property string $rad_sababi
 * @property int $report_id
 */
class ReportFoydalanishgaQabulqilish extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report_foydalanishga_qabulqilish';
    }

    public $month;
    public $user_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ruxsatnoma_date', 'xulosa_date','month','user_id'], 'safe'],
            [['xulosa_number', 'report_id'], 'integer'],
            [['hudud_name', 'rad_sababi'], 'string', 'max' => 500],
            [['ruxsatnoma_fish', 'natija_ijobiy', 'natija_rad'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hudud_name' => 'Xudud nomi (M.F.Y)',
            'ruxsatnoma_fish' => 'Murojaat etgan shaxsning F.I.Sh (tadbirkorlik subyekti nomi)',
            'ruxsatnoma_date' => 'Murojaat qilingan sana',
            'xulosa_date' => 'Berilgan xulosa yoki ruxsatnoma sanasi',
            'xulosa_number' => 'Berilgan xulosa yoki ruxsatnoma raqami',
            'natija_ijobiy' => 'Qanoatlantirilgan',
            'natija_rad' => 'Rad etilgan',
            'rad_sababi' => 'Rad etish sabablari',
            'report_id' => 'Report ID',
        ];
    }

    public static function getCount($user_id = NULL, $month_id = NULL){

        $reports  = [];
        $count = 0;

        if(!empty($user_id)){

            $reports = ArrayHelper::map(Report::find()->where(['document_type'=>7])->andWhere(['user_id'=>$user_id])->andWhere(['status'=>40])->all(),'id','id');

        }

        if(!empty($month_id)){

            $reports = ArrayHelper::map(Report::find()->where(['document_type'=>7])->andWhere(['month'=>$month_id])->andWhere(['status'=>40])->all(),'id','id');

        }

        if(!empty($user_id) && !empty($month_id)){

            $reports = ArrayHelper::map(Report::find()->where(['document_type'=>7])->andWhere(['user_id'=>$user_id])->andWhere(['month'=>$month_id])->andWhere(['status'=>40])->all(),'id','id');

        }

        $count = ReportFoydalanishgaQabulqilish::find()->where(['report_id' => $reports])->count();

        return $count;

    }
}
