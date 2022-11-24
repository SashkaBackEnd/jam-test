<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "profile_socials".
 *
 * @property int $id
 * @property int $user__id
 * @property string|null $social_profile_link
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProfileSocials extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile_socials';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user__id'], 'required'],
            [['user__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['social_profile_link'], 'string', 'max' => 500],
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
            'social_profile_link' => 'Social Profile Link',
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
     * @return \common\models\base\query\ProfileSocialsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProfileSocialsQuery(get_called_class());
    }
}
