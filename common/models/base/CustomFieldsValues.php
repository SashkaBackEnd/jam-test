<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "custom_fields_values".
 *
 * @property int $id
 * @property string|null $object_alias
 * @property int|null $object__id
 * @property int|null $field__id
 * @property string|null $value
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class CustomFieldsValues extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'custom_fields_values';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['object__id', 'field__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['object_alias'], 'string', 'max' => 255],
            [['value'], 'string', 'max' => 5000],
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
            'object_alias' => 'Object Alias',
            'object__id' => 'Object  ID',
            'field__id' => 'Field  ID',
            'value' => 'Value',
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
     * @return \common\models\base\query\CustomFieldsValuesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CustomFieldsValuesQuery(get_called_class());
    }
}
