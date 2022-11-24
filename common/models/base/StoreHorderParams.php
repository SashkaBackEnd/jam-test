<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "store_horder_params".
 *
 * @property int $horder_id
 * @property string $name
 * @property string $value
 * @property string|null $module
 */
class StoreHorderParams extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'store_horder_params';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['horder_id', 'name', 'value'], 'required'],
            [['horder_id'], 'integer'],
            [['value'], 'string'],
            [['name', 'module'], 'string', 'max' => 128],
            [['horder_id', 'name'], 'unique', 'targetAttribute' => ['horder_id', 'name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'horder_id' => 'Horder ID',
            'name' => 'Name',
            'value' => 'Value',
            'module' => 'Module',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\StoreHorderParamsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\StoreHorderParamsQuery(get_called_class());
    }
}
