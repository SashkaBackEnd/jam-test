<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "user_verification_file_types_lang".
 *
 * @property int $id
 * @property int|null $user_verification_file_types__id
 * @property string|null $lang
 * @property string|null $name
 * @property string|null $description
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UserVerificationFileTypesLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_verification_file_types_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_verification_file_types__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 500],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['user_verification_file_types__id', 'lang'], 'unique', 'targetAttribute' => ['user_verification_file_types__id', 'lang']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_verification_file_types__id' => 'User Verification File Types  ID',
            'lang' => 'Lang',
            'name' => 'Name',
            'description' => 'Description',
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
     * @return \common\models\base\query\UserVerificationFileTypesLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UserVerificationFileTypesLangQuery(get_called_class());
    }
}
