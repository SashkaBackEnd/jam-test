<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "translate_services_params".
 *
 * @property int $id
 * @property int|null $is_active
 * @property string $alias
 * @property string|null $key
 * @property string|null $service_url
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class TranslateServicesParams extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'translate_services_params';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active', 'created_by', 'modified_by'], 'integer'],
            [['alias'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['key'], 'string', 'max' => 200],
            [['service_url'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'is_active' => 'Is Active',
            'alias' => 'Alias',
            'key' => 'Key',
            'service_url' => 'Service Url',
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
     * @return \common\models\base\query\TranslateServicesParamsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\TranslateServicesParamsQuery(get_called_class());
    }
}
