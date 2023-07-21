<?php

namespace common\models;

use common\components\Model;
use Yii;

/**
 * This is the model class for table "branch".
 *
 * @property int $id
 * @property string $title
 * @property string $leader
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $leader_info
 * @property int $district_id
 * @property int $status
 * @property string $slug
 * @property string $map_link
 */
class Branch extends Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'branch';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'leader', 'phone', 'email', 'address', 'leader_info', 'district_id', 'status', 'slug'], 'required'],
            [['leader_info', 'map_link'], 'string'],
            [['district_id', 'status'], 'integer'],
            [['title', 'leader', 'phone', 'email', 'address', 'slug'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'leader' => 'Leader',
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'Address',
            'leader_info' => 'Leader Info',
            'district_id' => 'District ID',
            'status' => 'Status',
            'slug' => 'Slug',
            'map_link' => 'Map Link',
        ];
    }

    public function getDistrict(){
        return $this->hasOne(District::className(),['id'=>'district_id']);
    }

}
