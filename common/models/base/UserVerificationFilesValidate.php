<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "user_verification_files_validate".
 *
 * @property int $id
 * @property int|null $user_verification_documents__id
 * @property int|null $user_verification_files__id Файл
 * @property int|null $users__id
 * @property int $status_id Статус файла: 1 - на валидации, 2 - отклонен, 3 - подтвержден
 * @property string|null $reason Причина отклонения файла
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UserVerificationFilesValidate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_verification_files_validate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_verification_documents__id', 'user_verification_files__id', 'users__id', 'status_id', 'created_by', 'modified_by'], 'integer'],
            [['reason'], 'string'],
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
            'user_verification_documents__id' => 'User Verification Documents  ID',
            'user_verification_files__id' => 'User Verification Files  ID',
            'users__id' => 'Users  ID',
            'status_id' => 'Status ID',
            'reason' => 'Reason',
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
     * @return \common\models\base\query\UserVerificationFilesValidateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UserVerificationFilesValidateQuery(get_called_class());
    }
}
