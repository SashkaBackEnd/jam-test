<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "war_warehouse".
 *
 * @property int $id
 * @property string|null $number Номер склада
 * @property int|null $war_warehouse_rank__id
 * @property int|null $custom_num
 * @property string|null $info
 * @property float $delivery_price Стоимость доставки
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $skype
 * @property int|null $country_id
 * @property int|null $region_id
 * @property int|null $city_id
 * @property int|null $war_type__id
 * @property int $office Если флажок установлен, то склад должен отображаться пользователю в корзине в качестве офиса доставки продукции
 * @property int|null $users__id
 * @property string|null $legal_details Реквизиты юридического лица
 * @property int|null $visibility 1- видемость 2- удален (не видем)
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class WarWarehouse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'war_warehouse';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['war_warehouse_rank__id', 'custom_num', 'country_id', 'region_id', 'city_id', 'war_type__id', 'office', 'users__id', 'visibility', 'created_by', 'modified_by'], 'integer'],
            [['info', 'legal_details'], 'string'],
            [['delivery_price'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['number'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20],
            [['email', 'skype'], 'string', 'max' => 60],
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
            'war_warehouse_rank__id' => 'War Warehouse Rank  ID',
            'custom_num' => 'Custom Num',
            'info' => 'Info',
            'delivery_price' => 'Delivery Price',
            'phone' => 'Phone',
            'email' => 'Email',
            'skype' => 'Skype',
            'country_id' => 'Country ID',
            'region_id' => 'Region ID',
            'city_id' => 'City ID',
            'war_type__id' => 'War Type  ID',
            'office' => 'Office',
            'users__id' => 'Users  ID',
            'legal_details' => 'Legal Details',
            'visibility' => 'Visibility',
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
     * @return \common\models\base\query\WarWarehouseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\WarWarehouseQuery(get_called_class());
    }
}
