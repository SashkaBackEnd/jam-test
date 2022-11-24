<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "role_message_type".
 *
 * @property int $id
 * @property string $role
 * @property string $message_type
 * @property int $is_active
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class RoleMessageType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'role_message_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role', 'message_type'], 'required'],
            [['is_active', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['role', 'message_type'], 'string', 'max' => 64],
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
            'role' => 'Role',
            'message_type' => 'Message Type',
            'is_active' => 'Is Active',
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
     * @return \common\models\base\query\RoleMessageTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\RoleMessageTypeQuery(get_called_class());
    }
}
