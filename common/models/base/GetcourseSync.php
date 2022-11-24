<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "getcourse_sync".
 *
 * @property int $id
 * @property int|null $users__id
 * @property int $attempts
 * @property int $status 0 - открыт, 1 - подтвержден, 2 - ошибка
 * @property string $type
 * @property string|null $data
 * @property int $created_by
 * @property string $created_at
 * @property string $created_ip
 * @property int|null $modified_by
 * @property string|null $modified_at
 * @property string|null $modified_ip
 */
class GetcourseSync extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'getcourse_sync';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id', 'attempts', 'status', 'created_by', 'modified_by'], 'integer'],
            [['type', 'created_by', 'created_at', 'created_ip'], 'required'],
            [['data'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['type', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
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
            'attempts' => 'Attempts',
            'status' => 'Status',
            'type' => 'Type',
            'data' => 'Data',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'created_ip' => 'Created Ip',
            'modified_by' => 'Modified By',
            'modified_at' => 'Modified At',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\GetcourseSyncQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\GetcourseSyncQuery(get_called_class());
    }
}
