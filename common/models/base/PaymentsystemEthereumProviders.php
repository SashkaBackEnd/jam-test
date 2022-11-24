<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "paymentsystem_ethereum_providers".
 *
 * @property int $id
 * @property string|null $alias Алиас провайдера
 * @property string|null $name Название, он же класс
 * @property string|null $mainnet Адрес API реальной сети
 * @property string|null $ropsten Адрес API тестовой сети Ropsten
 * @property string|null $api_key Ключ для работы API по необходимости
 * @property int|null $default Провайдер по умолчанию
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PaymentsystemEthereumProviders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentsystem_ethereum_providers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['default', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias', 'name', 'mainnet', 'ropsten', 'api_key'], 'string', 'max' => 255],
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
            'alias' => 'Alias',
            'name' => 'Name',
            'mainnet' => 'Mainnet',
            'ropsten' => 'Ropsten',
            'api_key' => 'Api Key',
            'default' => 'Default',
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
     * @return \common\models\base\query\PaymentsystemEthereumProvidersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsystemEthereumProvidersQuery(get_called_class());
    }
}
