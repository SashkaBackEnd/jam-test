<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "custom_fields".
 *
 * @property int $id
 * @property int|null $custom_field_category__id
 * @property string $type
 * @property string $name
 * @property string $field_format
 * @property string|null $regexp
 * @property int $min_length
 * @property int $max_length
 * @property int $is_required
 * @property int $is_for_all
 * @property int $is_filter
 * @property int|null $position
 * @property int|null $searchable
 * @property int|null $editable
 * @property int $visible
 * @property int $view_on_catalog_page
 * @property int $view_on_product_page
 * @property string $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class CustomFields extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'custom_fields';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['custom_field_category__id', 'min_length', 'max_length', 'is_required', 'is_for_all', 'is_filter', 'position', 'searchable', 'editable', 'visible', 'view_on_catalog_page', 'view_on_product_page', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['type', 'name', 'field_format'], 'string', 'max' => 30],
            [['regexp'], 'string', 'max' => 255],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'custom_field_category__id' => 'Custom Field Category  ID',
            'type' => 'Type',
            'name' => 'Name',
            'field_format' => 'Field Format',
            'regexp' => 'Regexp',
            'min_length' => 'Min Length',
            'max_length' => 'Max Length',
            'is_required' => 'Is Required',
            'is_for_all' => 'Is For All',
            'is_filter' => 'Is Filter',
            'position' => 'Position',
            'searchable' => 'Searchable',
            'editable' => 'Editable',
            'visible' => 'Visible',
            'view_on_catalog_page' => 'View On Catalog Page',
            'view_on_product_page' => 'View On Product Page',
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
     * @return \common\models\base\query\CustomFieldsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CustomFieldsQuery(get_called_class());
    }
}
