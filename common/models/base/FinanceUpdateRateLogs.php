<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "finance_update_rate_logs".
 *
 * @property int $id
 * @property string $alias_api адрес API
 * @property string $response
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class FinanceUpdateRateLogs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_update_rate_logs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias_api', 'response'], 'required'],
            [['created_by', 'modified_by'], 'integer'],
            [['modified_at'], 'safe'],
            [['alias_api', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['response'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias_api' => 'Alias Api',
            'response' => 'Response',
            'created_by' => 'Created By',
            'created_ip' => 'Created Ip',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\FinanceUpdateRateLogsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FinanceUpdateRateLogsQuery(get_called_class());
    }
}
