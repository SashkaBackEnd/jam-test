<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "marketing_pv_history".
 *
 * @property int $id
 * @property string $type
 * @property int $users__id_to
 * @property int $users__id_from
 * @property int $level
 * @property int $store_horders__id
 * @property float $amount
 * @property int|null $qualifications__id_to
 * @property int|null $qualifications__id_from
 * @property int|null $marketing_periods__id
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MarketingPvHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marketing_pv_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'users__id_to', 'users__id_from', 'level', 'store_horders__id', 'amount'], 'required'],
            [['users__id_to', 'users__id_from', 'level', 'store_horders__id', 'qualifications__id_to', 'qualifications__id_from', 'marketing_periods__id', 'created_by', 'modified_by'], 'integer'],
            [['amount'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['type'], 'string', 'max' => 255],
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
            'type' => 'Type',
            'users__id_to' => 'Users  Id To',
            'users__id_from' => 'Users  Id From',
            'level' => 'Level',
            'store_horders__id' => 'Store Horders  ID',
            'amount' => 'Amount',
            'qualifications__id_to' => 'Qualifications  Id To',
            'qualifications__id_from' => 'Qualifications  Id From',
            'marketing_periods__id' => 'Marketing Periods  ID',
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
     * @return \common\models\base\query\MarketingPvHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MarketingPvHistoryQuery(get_called_class());
    }
}
