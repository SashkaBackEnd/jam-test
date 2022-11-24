<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "finance_update_rate_services".
 *
 * @property int $id
 * @property string $alias
 * @property string $api_url Адрес API
 * @property string|null $api_key_name Название апи клюа
 * @property string|null $api_key АПИ ключ
 * @property string $request_format Формат запроса
 * @property string $path Путь к классу, обработчику события
 * @property string $class Название класса
 * @property string $method Название метода
 * @property int|null $is_active
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class FinanceUpdateRateServices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_update_rate_services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias', 'api_url', 'request_format', 'path', 'class', 'method'], 'required'],
            [['is_active', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias', 'api_url', 'request_format', 'class', 'method', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['api_key_name'], 'string', 'max' => 20],
            [['api_key'], 'string', 'max' => 64],
            [['path'], 'string', 'max' => 1000],
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
            'api_url' => 'Api Url',
            'api_key_name' => 'Api Key Name',
            'api_key' => 'Api Key',
            'request_format' => 'Request Format',
            'path' => 'Path',
            'class' => 'Class',
            'method' => 'Method',
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
     * @return \common\models\base\query\FinanceUpdateRateServicesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FinanceUpdateRateServicesQuery(get_called_class());
    }
}
