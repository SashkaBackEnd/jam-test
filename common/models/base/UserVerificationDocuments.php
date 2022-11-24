<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "user_verification_documents".
 *
 * @property int $id
 * @property int|null $users__id
 * @property int|null $user_verification_file_types__id Файл документа
 * @property string|null $num Номер документа
 * @property int $status_id Статус документа: 1 - документ загружен, 2 - документ подтвержден, -1 документ отклонен
 * @property string|null $date_open Дата предоставления документа
 * @property string|null $date_closed Дата выполнения документа
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UserVerificationDocuments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_verification_documents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id', 'user_verification_file_types__id', 'status_id', 'created_by', 'modified_by'], 'integer'],
            [['date_open', 'date_closed', 'created_at', 'modified_at'], 'safe'],
            [['num'], 'string', 'max' => 255],
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
            'users__id' => 'Users  ID',
            'user_verification_file_types__id' => 'User Verification File Types  ID',
            'num' => 'Num',
            'status_id' => 'Status ID',
            'date_open' => 'Date Open',
            'date_closed' => 'Date Closed',
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
     * @return \common\models\base\query\UserVerificationDocumentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UserVerificationDocumentsQuery(get_called_class());
    }
}
