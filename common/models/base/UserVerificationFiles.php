<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "user_verification_files".
 *
 * @property int $id
 * @property int|null $users__id
 * @property int|null $user_verification_documents__id
 * @property string|null $path
 * @property string|null $title Название файла
 * @property string|null $mime_type
 * @property int $is_deleted Статус файла: 0 - актуальный, 1 - удаленный
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UserVerificationFiles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_verification_files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id', 'user_verification_documents__id', 'is_deleted', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['path'], 'string', 'max' => 500],
            [['title'], 'string', 'max' => 200],
            [['mime_type', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
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
            'user_verification_documents__id' => 'User Verification Documents  ID',
            'path' => 'Path',
            'title' => 'Title',
            'mime_type' => 'Mime Type',
            'is_deleted' => 'Is Deleted',
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
     * @return \common\models\base\query\UserVerificationFilesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UserVerificationFilesQuery(get_called_class());
    }
}
