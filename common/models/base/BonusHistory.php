<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "bonus_history".
 *
 * @property int $id
 * @property int $users__id Получатель бонуса
 * @property int|null $users__id_initiator Инициатор бонуса
 * @property float $amount Сумма операции
 * @property string|null $bonus_types__alias Тип бонуса
 * @property int|null $finance_transactions__id ID Финансовой операции
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class BonusHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bonus_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id'], 'required'],
            [['users__id', 'users__id_initiator', 'finance_transactions__id', 'created_by', 'modified_by'], 'integer'],
            [['amount'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['bonus_types__alias'], 'string', 'max' => 30],
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
            'users__id_initiator' => 'Users  Id Initiator',
            'amount' => 'Amount',
            'bonus_types__alias' => 'Bonus Types  Alias',
            'finance_transactions__id' => 'Finance Transactions  ID',
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
     * @return \common\models\base\query\BonusHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\BonusHistoryQuery(get_called_class());
    }
}
