<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "public_services_category".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 */
class PublicServicesCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'public_services_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
        ];
    }

    public function getLang($column, $lang = null)
    {

        $lang = $lang ? $lang : Yii::$app->language;
        if($lang == Yii::$app->params['main_language']) {
            $model = Yii::$app->db->createCommand('Select * from '.$this->tableName().' where id=' . $this->id . ' AND status=1')->queryOne();
        } else {
            $id = Languages::find()->filterWhere(['abb' => $lang])->one()->id;
            $model = Yii::$app->db->createCommand('Select * from '.$this->tableName().'_lang where parent='. $this->id.' and lang=' . $id . ' AND status=1')->queryOne();
        }
        return $model[$column];
    }
}
