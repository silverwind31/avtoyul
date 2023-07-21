<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "public_services".
 *
 * @property int $id
 * @property string $name
 * @property string $link
 * @property string $icon
 * @property int $status
 */
class PublicServices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'public_services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'link', 'category'], 'required'],
            [['status','category'], 'integer'],
            [['name'], 'string', 'max' => 500],
            [['link', 'icon', 'main_image'], 'string', 'max' => 255],
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
            'link' => 'Link',
            'icon' => 'Icon',
            'status' => 'Status',
            'category' => 'Category',
            'main_image' => 'Image',
        ];
    }

    public function getLang($column, $lang = null)
    {

        $lang = $lang ? $lang : Yii::$app->language;
        if($lang == Yii::$app->params['main_language']) {
            $model = Yii::$app->db->createCommand('Select * from '.$this->tableName().' where id=' . $this->id . ' AND status=1')->queryOne();
        } else {
            $id = Languages::find()->filterWhere(['abb' => $lang])->one()->id;
            $model = Yii::$app->db->createCommand('Select * from '.$this->tableName().'_lang where parent='. $this->id.' and lang=' . $id)->queryOne();
        }
        return $model[$column];
    }
}
