<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "payment_systems_config".
 *
 * @property int $id
 * @property string|null $payment_systems__alias
 * @property string|null $name
 * @property string|null $value
 * @property string|null $typeof
 * @property string|null $action_code
 * @property int|null $is_allowed_edit_by_admin
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PaymentSystemsConfig extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_systems_config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value', 'typeof', 'action_code'], 'string'],
            [['is_allowed_edit_by_admin', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['payment_systems__alias', 'name', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['payment_systems__alias', 'name'], 'unique', 'targetAttribute' => ['payment_systems__alias', 'name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payment_systems__alias' => 'Payment Systems  Alias',
            'name' => 'Name',
            'value' => 'Value',
            'typeof' => 'Typeof',
            'action_code' => 'Action Code',
            'is_allowed_edit_by_admin' => 'Is Allowed Edit By Admin',
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
     * @return \common\models\base\query\PaymentSystemsConfigQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentSystemsConfigQuery(get_called_class());
    }
}
