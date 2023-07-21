<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "public_services_category_lang".
 *
 * @property int $id
 * @property int $lang
 * @property int $parent
 * @property string $name
 */
class PublicServicesCategoryLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'public_services_category_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lang', 'parent'], 'required'],
            [['lang', 'parent'], 'integer'],
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
            'lang' => 'Lang',
            'parent' => 'Parent',
            'name' => 'Name',
        ];
    }
}
