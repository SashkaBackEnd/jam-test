<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "matrix_type_actions".
 *
 * @property int $id
 * @property int $matrix_types__id
 * @property int $action Action: 1 - пользователь зашел в матрицу, 2 - пользователь закрыл матрицу
 * @property int $matrix_actions__id
 * @property int|null $sort_no
 * @property int $is_transaction Провести фин. операцию: 0 - нет, 1 - да
 * @property int|null $finance_transactions_specs__id
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MatrixTypeActions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matrix_type_actions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['matrix_types__id', 'action', 'matrix_actions__id'], 'required'],
            [['matrix_types__id', 'action', 'matrix_actions__id', 'sort_no', 'is_transaction', 'finance_transactions_specs__id', 'created_by', 'modified_by'], 'integer'],
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
            'matrix_types__id' => 'Matrix Types  ID',
            'action' => 'Action',
            'matrix_actions__id' => 'Matrix Actions  ID',
            'sort_no' => 'Sort No',
            'is_transaction' => 'Is Transaction',
            'finance_transactions_specs__id' => 'Finance Transactions Specs  ID',
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
     * @return \common\models\base\query\MatrixTypeActionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MatrixTypeActionsQuery(get_called_class());
    }
}
