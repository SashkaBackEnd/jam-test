<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "paymentsystem_robokassa_transactions".
 *
 * @property int $id
 * @property float|null $OutSum
 * @property int|null $InvId
 * @property string|null $SignatureValue
 * @property string|null $SHP_guid
 * @property int|null $is_confirmed
 * @property string|null $reason
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PaymentsystemRobokassaTransactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentsystem_robokassa_transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['OutSum'], 'number'],
            [['InvId', 'is_confirmed', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['SignatureValue'], 'string', 'max' => 1000],
            [['SHP_guid', 'reason', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'OutSum' => 'Out Sum',
            'InvId' => 'Inv ID',
            'SignatureValue' => 'Signature Value',
            'SHP_guid' => 'Shp Guid',
            'is_confirmed' => 'Is Confirmed',
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
     * @return \common\models\base\query\PaymentsystemRobokassaTransactionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsystemRobokassaTransactionsQuery(get_called_class());
    }
}
