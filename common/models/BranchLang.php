<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "branch_lang".
 *
 * @property int $id
 * @property int $lang
 * @property int $parent
 * @property string $title
 * @property string $leader
 * @property string $address
 * @property string $leader_info
 */
class BranchLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'branch_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lang', 'parent'], 'required'],
            [['lang', 'parent'], 'integer'],
            [['leader_info'], 'string'],
            [['title', 'leader', 'address'], 'string', 'max' => 500],
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
            'title' => 'Title',
            'leader' => 'Leader',
            'address' => 'Address',
            'leader_info' => 'Leader Info',
        ];
    }
}
