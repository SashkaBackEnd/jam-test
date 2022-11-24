<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "war_horders".
 *
 * @property int $id
 * @property string|null $number
 * @property float $delivery_price Стоимость доставки
 * @property int|null $war_statement__id_in
 * @property int|null $war_statement__id_out
 * @property string|null $object_alias_to
 * @property int|null $object_id_to
 * @property string|null $object_alias_from
 * @property int|null $object_id_from
 * @property float|null $amount
 * @property float $point
 * @property float|null $amount_delivery
 * @property int|null $status__id
 * @property string|null $status_chage_date
 * @property int|null $type__id
 * @property int|null $horder__id
 * @property int $storekeeper__id
 * @property int $is_request 0 - обычная накладная, 1 - заявка, 2 - заявка, на которую создана накладная
 * @property string|null $date
 * @property string|null $notes
 * @property string|null $attachments
 * @property int $telegram_info
 * @property int|null $queue_update_products
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class WarHorders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'war_horders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['delivery_price', 'amount', 'point', 'amount_delivery'], 'number'],
            [['war_statement__id_in', 'war_statement__id_out', 'object_id_to', 'object_id_from', 'status__id', 'type__id', 'horder__id', 'storekeeper__id', 'is_request', 'telegram_info', 'queue_update_products', 'created_by', 'modified_by'], 'integer'],
            [['status_chage_date', 'date', 'created_at', 'modified_at'], 'safe'],
            [['storekeeper__id'], 'required'],
            [['notes', 'attachments'], 'string'],
            [['number', 'object_alias_to', 'object_alias_from'], 'string', 'max' => 255],
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
            'number' => 'Number',
            'delivery_price' => 'Delivery Price',
            'war_statement__id_in' => 'War Statement  Id In',
            'war_statement__id_out' => 'War Statement  Id Out',
            'object_alias_to' => 'Object Alias To',
            'object_id_to' => 'Object Id To',
            'object_alias_from' => 'Object Alias From',
            'object_id_from' => 'Object Id From',
            'amount' => 'Amount',
            'point' => 'Point',
            'amount_delivery' => 'Amount Delivery',
            'status__id' => 'Status  ID',
            'status_chage_date' => 'Status Chage Date',
            'type__id' => 'Type  ID',
            'horder__id' => 'Horder  ID',
            'storekeeper__id' => 'Storekeeper  ID',
            'is_request' => 'Is Request',
            'date' => 'Date',
            'notes' => 'Notes',
            'attachments' => 'Attachments',
            'telegram_info' => 'Telegram Info',
            'queue_update_products' => 'Queue Update Products',
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
     * @return \common\models\base\query\WarHordersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\WarHordersQuery(get_called_class());
    }
}
