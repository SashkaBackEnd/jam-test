<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "war_warehouse_balance".
 *
 * @property int $id
 * @property int $warehouse__id
 * @property int $product__id
 * @property int|null $balance
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class WarWarehouseBalance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'war_warehouse_balance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['warehouse__id', 'product__id'], 'required'],
            [['warehouse__id', 'product__id', 'balance', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['warehouse__id', 'product__id'], 'unique', 'targetAttribute' => ['warehouse__id', 'product__id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'warehouse__id' => 'Warehouse  ID',
            'product__id' => 'Product  ID',
            'balance' => 'Balance',
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
     * @return \common\models\base\query\WarWarehouseBalanceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\WarWarehouseBalanceQuery(get_called_class());
    }
}
