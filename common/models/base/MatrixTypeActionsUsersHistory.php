<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "matrix_type_actions_users_history".
 *
 * @property int $id
 * @property int|null $matrix_type_actions_users__id
 * @property int|null $users__id
 * @property int $matrix_types__id
 * @property int $action Action: 1 - пользователь зашел в матрицу, 2 - пользователь закрыл матрицу
 * @property int $matrix_actions__id
 * @property string|null $matrix_action_param_value
 * @property string|null $matrix_type_actions_users__created_at
 * @property int|null $matrix_type_actions_users__created_by
 * @property string|null $matrix_type_actions_users__created_ip
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MatrixTypeActionsUsersHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matrix_type_actions_users_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['matrix_type_actions_users__id', 'users__id', 'matrix_types__id', 'action', 'matrix_actions__id', 'matrix_type_actions_users__created_by', 'created_by', 'modified_by'], 'integer'],
            [['matrix_types__id', 'action', 'matrix_actions__id'], 'required'],
            [['matrix_type_actions_users__created_at', 'created_at', 'modified_at'], 'safe'],
            [['matrix_action_param_value'], 'string', 'max' => 1000],
            [['matrix_type_actions_users__created_ip', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'matrix_type_actions_users__id' => 'Matrix Type Actions Users  ID',
            'users__id' => 'Users  ID',
            'matrix_types__id' => 'Matrix Types  ID',
            'action' => 'Action',
            'matrix_actions__id' => 'Matrix Actions  ID',
            'matrix_action_param_value' => 'Matrix Action Param Value',
            'matrix_type_actions_users__created_at' => 'Matrix Type Actions Users  Created At',
            'matrix_type_actions_users__created_by' => 'Matrix Type Actions Users  Created By',
            'matrix_type_actions_users__created_ip' => 'Matrix Type Actions Users  Created Ip',
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
     * @return \common\models\base\query\MatrixTypeActionsUsersHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MatrixTypeActionsUsersHistoryQuery(get_called_class());
    }
}
