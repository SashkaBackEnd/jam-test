<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "profile_payment_addresses_tether".
 *
 * @property int $id
 * @property int $users__id
 * @property string|null $tether_address Адрес платежной системы
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProfilePaymentAddressesTether extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile_payment_addresses_tether';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id'], 'required'],
            [['users__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['tether_address', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
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
            'tether_address' => 'Tether Address',
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
     * @return \common\models\base\query\ProfilePaymentAddressesTetherQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProfilePaymentAddressesTetherQuery(get_called_class());
    }
}
