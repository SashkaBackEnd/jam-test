<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "paymentsystem_yandexmoney_notifications".
 *
 * @property int $id
 * @property int $transactions__id
 * @property string $yandex_transaction_id
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PaymentsystemYandexmoneyNotifications extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentsystem_yandexmoney_notifications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['transactions__id', 'yandex_transaction_id'], 'required'],
            [['transactions__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['yandex_transaction_id'], 'string', 'max' => 255],
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
            'transactions__id' => 'Transactions  ID',
            'yandex_transaction_id' => 'Yandex Transaction ID',
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
     * @return \common\models\base\query\PaymentsystemYandexmoneyNotificationsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsystemYandexmoneyNotificationsQuery(get_called_class());
    }
}
