<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "profile_payment_addresses_paybox".
 *
 * @property int $id
 * @property int $users__id
 * @property string|null $paybox_address
 * @property string|null $payment_card
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 *
 * @property Users $users
 */
class ProfilePaymentAddressesPaybox extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile_payment_addresses_paybox';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id'], 'required'],
            [['users__id', 'created_by', 'modified_by'], 'integer'],
            [['payment_card'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['paybox_address', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['users__id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['users__id' => 'id']],
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
            'paybox_address' => 'Paybox Address',
            'payment_card' => 'Payment Card',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'created_ip' => 'Created Ip',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery|\common\models\base\query\UsersQuery
     */
    public function getUsers()
    {
        return $this->hasOne(Users::className(), ['id' => 'users__id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\ProfilePaymentAddressesPayboxQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProfilePaymentAddressesPayboxQuery(get_called_class());
    }
}
