<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "payment_systems_modes_availability".
 *
 * @property int $id
 * @property int $payment_systems__id
 * @property string|null $direction
 * @property string|null $mode
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PaymentSystemsModesAvailability extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_systems_modes_availability';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_systems__id'], 'required'],
            [['payment_systems__id', 'created_by', 'modified_by'], 'integer'],
            [['direction', 'mode'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['payment_systems__id', 'direction', 'mode'], 'unique', 'targetAttribute' => ['payment_systems__id', 'direction', 'mode']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payment_systems__id' => 'Payment Systems  ID',
            'direction' => 'Direction',
            'mode' => 'Mode',
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
     * @return \common\models\base\query\PaymentSystemsModesAvailabilityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentSystemsModesAvailabilityQuery(get_called_class());
    }
}
