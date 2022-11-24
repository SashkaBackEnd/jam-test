<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_sponsors_region".
 *
 * @property int $id
 * @property int $user__id ID пользователя
 * @property int $country_id ID страны
 * @property int $region_id ID региона/области
 * @property int $city_id ID города
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UsersSponsorsRegion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_sponsors_region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user__id', 'country_id', 'region_id', 'city_id'], 'required'],
            [['user__id', 'country_id', 'region_id', 'city_id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user__id' => 'User  ID',
            'country_id' => 'Country ID',
            'region_id' => 'Region ID',
            'city_id' => 'City ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'created_ip' => 'Created Ip',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\UsersSponsorsRegionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersSponsorsRegionQuery(get_called_class());
    }
}
