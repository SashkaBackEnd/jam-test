<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_register_statuses".
 *
 * @property int $id
 * @property string|null $alias
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UsersRegisterStatuses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_register_statuses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'modified_at'], 'safe'],
            [['created_by', 'modified_by'], 'integer'],
            [['alias'], 'string', 'max' => 50],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['alias'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
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
     * @return \common\models\base\query\UsersRegisterStatusesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersRegisterStatusesQuery(get_called_class());
    }
}
