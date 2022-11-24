<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "payment_systems".
 *
 * @property int $id
 * @property string|null $name
 * @property string $alias
 * @property string|null $title Название платежной системы (для отображения на сайте)
 * @property string|null $description_help
 * @property string|null $brief_text
 * @property string|null $module_owner  Имя модуля владельца 
 * @property int|null $is_show  Отображается ли платёжная система на сайте 
 * @property int|null $attachments__id
 * @property string $input_mode
 * @property string $output_mode
 * @property string $commission_in_type
 * @property float $commission_in_value
 * @property string $period_out_check_type
 * @property float $max_amount_out
 * @property float $min_amount_out
 * @property string $commission_out_type
 * @property float $commission_out_value
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PaymentSystems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_systems';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias'], 'required'],
            [['description_help', 'brief_text', 'input_mode', 'output_mode', 'commission_in_type', 'period_out_check_type', 'commission_out_type'], 'string'],
            [['is_show', 'attachments__id', 'created_by', 'modified_by'], 'integer'],
            [['commission_in_value', 'max_amount_out', 'min_amount_out', 'commission_out_value'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['name', 'alias', 'title', 'module_owner', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
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
            'name' => 'Name',
            'alias' => 'Alias',
            'title' => 'Title',
            'description_help' => 'Description Help',
            'brief_text' => 'Brief Text',
            'module_owner' => 'Module Owner',
            'is_show' => 'Is Show',
            'attachments__id' => 'Attachments  ID',
            'input_mode' => 'Input Mode',
            'output_mode' => 'Output Mode',
            'commission_in_type' => 'Commission In Type',
            'commission_in_value' => 'Commission In Value',
            'period_out_check_type' => 'Period Out Check Type',
            'max_amount_out' => 'Max Amount Out',
            'min_amount_out' => 'Min Amount Out',
            'commission_out_type' => 'Commission Out Type',
            'commission_out_value' => 'Commission Out Value',
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
     * @return \common\models\base\query\PaymentSystemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentSystemsQuery(get_called_class());
    }
}
