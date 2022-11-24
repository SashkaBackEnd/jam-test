<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "war_turnover_report_limit".
 *
 * @property int $id
 * @property int $product__id
 * @property int|null $warehouse__id
 * @property int|null $count
 * @property string|null $status
 * @property string|null $type
 * @property string|null $target
 * @property string|null $created_at
 * @property int|null $horder__id
 */
class WarTurnoverReportLimit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'war_turnover_report_limit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'product__id', 'warehouse__id', 'count', 'horder__id'], 'integer'],
            [['created_at'], 'safe'],
            [['status', 'type'], 'string', 'max' => 50],
            [['target'], 'string', 'max' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product__id' => 'Product  ID',
            'warehouse__id' => 'Warehouse  ID',
            'count' => 'Count',
            'status' => 'Status',
            'type' => 'Type',
            'target' => 'Target',
            'created_at' => 'Created At',
            'horder__id' => 'Horder  ID',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\WarTurnoverReportLimitQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\WarTurnoverReportLimitQuery(get_called_class());
    }
}
