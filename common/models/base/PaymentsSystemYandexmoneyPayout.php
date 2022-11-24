<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "payments_system_yandexmoney_payout".
 *
 * @property int $id
 * @property string $type
 * @property string|null $request
 * @property int|null $finance_transaction__id
 * @property string|null $step_alias
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PaymentsSystemYandexmoneyPayout extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payments_system_yandexmoney_payout';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['request'], 'string'],
            [['finance_transaction__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['type', 'step_alias'], 'string', 'max' => 255],
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
            'type' => 'Type',
            'request' => 'Request',
            'finance_transaction__id' => 'Finance Transaction  ID',
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
     * @return \common\models\base\query\PaymentsSystemYandexmoneyPayoutQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsSystemYandexmoneyPayoutQuery(get_called_class());
    }
}
