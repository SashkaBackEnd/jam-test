<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "admin_exchange_rate_currency".
 *
 * @property int $id
 * @property string $currency_width С чего
 * @property string $currency_into Во что
 * @property int $is_active
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class AdminExchangeRateCurrency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin_exchange_rate_currency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['currency_width', 'currency_into'], 'required'],
            [['is_active', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['currency_width', 'currency_into', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'currency_width' => 'Currency Width',
            'currency_into' => 'Currency Into',
            'is_active' => 'Is Active',
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
     * @return \common\models\base\query\AdminExchangeRateCurrencyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\AdminExchangeRateCurrencyQuery(get_called_class());
    }
}
