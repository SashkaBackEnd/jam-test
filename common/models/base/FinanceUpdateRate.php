<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "finance_update_rate".
 *
 * @property int $id
 * @property string $currency_with С чего
 * @property string $currency_into Во что
 * @property string $alias_api адрес API
 * @property int|null $sort_no
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class FinanceUpdateRate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_update_rate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['currency_with', 'currency_into', 'alias_api'], 'required'],
            [['sort_no', 'created_by', 'modified_by'], 'integer'],
            [['modified_at'], 'safe'],
            [['currency_with', 'currency_into', 'alias_api', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'currency_with' => 'Currency With',
            'currency_into' => 'Currency Into',
            'alias_api' => 'Alias Api',
            'sort_no' => 'Sort No',
            'created_by' => 'Created By',
            'created_ip' => 'Created Ip',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\FinanceUpdateRateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FinanceUpdateRateQuery(get_called_class());
    }
}
