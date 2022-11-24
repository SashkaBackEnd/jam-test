<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "message_levels".
 *
 * @property int $id
 * @property int $level_sponsor
 * @property int $level_structure
 * @property string $role
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MessageLevels extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'message_levels';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['level_sponsor', 'level_structure', 'created_by', 'modified_by'], 'integer'],
            [['role'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['role', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'level_sponsor' => 'Level Sponsor',
            'level_structure' => 'Level Structure',
            'role' => 'Role',
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
     * @return \common\models\base\query\MessageLevelsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MessageLevelsQuery(get_called_class());
    }
}
