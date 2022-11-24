<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "store_horders_fields".
 *
 * @property string $field_name
 * @property int|null $is_required
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class StoreHordersFields extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'store_horders_fields';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['field_name'], 'required'],
            [['is_required', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['field_name', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['field_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'field_name' => 'Field Name',
            'is_required' => 'Is Required',
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
     * @return \common\models\base\query\StoreHordersFieldsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\StoreHordersFieldsQuery(get_called_class());
    }
}
