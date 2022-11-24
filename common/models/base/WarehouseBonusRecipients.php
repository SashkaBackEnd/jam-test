<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "warehouse_bonus_recipients".
 *
 * @property int $id
 * @property int $recipient__id
 * @property int $warehouse__id
 * @property int $warehouse_turnover
 * @property float $percent
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class WarehouseBonusRecipients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'warehouse_bonus_recipients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recipient__id', 'warehouse__id', 'warehouse_turnover', 'percent'], 'required'],
            [['recipient__id', 'warehouse__id', 'warehouse_turnover', 'created_by', 'modified_by'], 'integer'],
            [['percent'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
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
            'recipient__id' => 'Recipient  ID',
            'warehouse__id' => 'Warehouse  ID',
            'warehouse_turnover' => 'Warehouse Turnover',
            'percent' => 'Percent',
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
     * @return \common\models\base\query\WarehouseBonusRecipientsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\WarehouseBonusRecipientsQuery(get_called_class());
    }
}
