<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "delivery_systems_config".
 *
 * @property int $id
 * @property string|null $delivery_systems__name
 * @property string|null $name
 * @property string|null $value
 * @property int|null $is_allowed_edit_by_admin
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class DeliverySystemsConfig extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'delivery_systems_config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value'], 'string'],
            [['is_allowed_edit_by_admin', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['delivery_systems__name', 'name', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['delivery_systems__name', 'name'], 'unique', 'targetAttribute' => ['delivery_systems__name', 'name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'delivery_systems__name' => 'Delivery Systems  Name',
            'name' => 'Name',
            'value' => 'Value',
            'is_allowed_edit_by_admin' => 'Is Allowed Edit By Admin',
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
     * @return \common\models\base\query\DeliverySystemsConfigQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\DeliverySystemsConfigQuery(get_called_class());
    }
}
