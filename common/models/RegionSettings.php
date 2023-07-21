<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "region_settings".
 *
 * @property int $id
 * @property string $region_id
 * @property string $full_name
 * @property string $leader_name
 * @property string $phone1
 * @property string $phone2
 * @property string $email
 * @property string $call_center
 * @property string $address
 */
class RegionSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region_id', 'full_name', 'leader_name'], 'required'],
            [['region_id', 'leader_name', 'phone1', 'phone2', 'email', 'call_center', 'address'], 'string', 'max' => 255],
            [['full_name'], 'string', 'max' => 500],
            ['map_id','safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'region_id' => 'Region ID',
            'full_name' => 'Full Name',
            'leader_name' => 'Leader Name',
            'phone1' => 'Phone1',
            'phone2' => 'Phone2',
            'email' => 'Email',
            'call_center' => 'Call Center',
            'address' => 'Address',
        ];
    }
}
