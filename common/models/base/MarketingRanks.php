<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "marketing_ranks".
 *
 * @property int $id
 * @property string $alias Псевдоним
 * @property string $status_alias Статус
 * @property float $amount_per_point Стоимость балла
 * @property int $sort_no
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MarketingRanks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marketing_ranks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias', 'sort_no'], 'required'],
            [['status_alias'], 'string'],
            [['amount_per_point'], 'number'],
            [['sort_no', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias'], 'string', 'max' => 30],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['alias'], 'unique'],
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
            'status_alias' => 'Status Alias',
            'amount_per_point' => 'Amount Per Point',
            'sort_no' => 'Sort No',
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
     * @return \common\models\base\query\MarketingRanksQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MarketingRanksQuery(get_called_class());
    }
}
