<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "payment_systems_log".
 *
 * @property int $id
 * @property int|null $type 1:ушло 2:пришло
 * @property string|null $request
 * @property string $type_request POST, XML,
 * @property string|null $url
 * @property int|null $finance_transaction__id
 * @property string|null $pay_system_alias
 * @property string|null $step_alias
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PaymentSystemsLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_systems_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'finance_transaction__id', 'created_by', 'modified_by'], 'integer'],
            [['request'], 'string'],
            [['type_request'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['type_request', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['url', 'pay_system_alias', 'step_alias'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'request' => 'Request',
            'type_request' => 'Type Request',
            'url' => 'Url',
            'finance_transaction__id' => 'Finance Transaction  ID',
            'pay_system_alias' => 'Pay System Alias',
            'step_alias' => 'Step Alias',
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
     * @return \common\models\base\query\PaymentSystemsLogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentSystemsLogQuery(get_called_class());
    }
}
