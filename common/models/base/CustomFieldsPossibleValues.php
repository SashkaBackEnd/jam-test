<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "custom_fields_possible_values".
 *
 * @property int $id
 * @property int|null $custom_field__id
 * @property string $value
 * @property int|null $isDefault
 * @property string $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class CustomFieldsPossibleValues extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'custom_fields_possible_values';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['custom_field__id', 'isDefault', 'created_by', 'modified_by'], 'integer'],
            [['value', 'created_at', 'modified_at'], 'required'],
            [['value'], 'string'],
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
            'custom_field__id' => 'Custom Field  ID',
            'value' => 'Value',
            'isDefault' => 'Is Default',
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
     * @return \common\models\base\query\CustomFieldsPossibleValuesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CustomFieldsPossibleValuesQuery(get_called_class());
    }
}
