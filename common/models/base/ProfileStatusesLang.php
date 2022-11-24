<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "profile_statuses_lang".
 *
 * @property int $id
 * @property int|null $profile_statuses__id
 * @property string|null $lang
 * @property string|null $name
 * @property int|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property int|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProfileStatusesLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile_statuses_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['profile_statuses__id', 'created_at', 'created_by', 'modified_at', 'modified_by'], 'integer'],
            [['lang'], 'string', 'max' => 3],
            [['name'], 'string', 'max' => 500],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['profile_statuses__id', 'lang'], 'unique', 'targetAttribute' => ['profile_statuses__id', 'lang']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'profile_statuses__id' => 'Profile Statuses  ID',
            'lang' => 'Lang',
            'name' => 'Name',
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
     * @return \common\models\base\query\ProfileStatusesLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProfileStatusesLangQuery(get_called_class());
    }
}
