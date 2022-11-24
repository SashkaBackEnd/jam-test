<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "profile_sponsors_tree_compression_temp".
 *
 * @property int $id
 * @property int $users__id
 * @property int $is_checked Прошел ли уже данный пользователь проверку
 * @property int|null $level
 * @property int|null $profile__sponsor__id
 * @property string|null $profile__upline
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProfileSponsorsTreeCompressionTemp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile_sponsors_tree_compression_temp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id', 'is_checked'], 'required'],
            [['users__id', 'is_checked', 'level', 'profile__sponsor__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['profile__upline'], 'string', 'max' => 4096],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['users__id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'users__id' => 'Users  ID',
            'is_checked' => 'Is Checked',
            'level' => 'Level',
            'profile__sponsor__id' => 'Profile  Sponsor  ID',
            'profile__upline' => 'Profile  Upline',
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
     * @return \common\models\base\query\ProfileSponsorsTreeCompressionTempQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProfileSponsorsTreeCompressionTempQuery(get_called_class());
    }
}
