<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "uploads_users".
 *
 * @property int $id
 * @property int|null $user__id
 * @property int|null $upload__id
 * @property string|null $date_upload
 * @property int|null $deleted
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UploadsUsers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uploads_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user__id', 'upload__id', 'deleted', 'created_by', 'modified_by'], 'integer'],
            [['date_upload', 'created_at', 'modified_at'], 'safe'],
            [['created_ip', 'modified_ip'], 'string', 'max' => 255],
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
            'upload__id' => 'Upload  ID',
            'date_upload' => 'Date Upload',
            'deleted' => 'Deleted',
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
     * @return \common\models\base\query\UploadsUsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UploadsUsersQuery(get_called_class());
    }
}
