<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "product_packages".
 *
 * @property int $id
 * @property string|null $alias
 * @property string|null $name
 * @property float $value
 * @property int|null $activity_months
 * @property int|null $weight
 * @property int $created_by
 * @property string $created_at
 * @property string $created_ip
 * @property int|null $modified_by
 * @property string|null $modified_at
 * @property string|null $modified_ip
 */
class ProductPackages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_packages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value', 'created_by', 'created_at', 'created_ip'], 'required'],
            [['value'], 'number'],
            [['activity_months', 'weight', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias', 'name'], 'string', 'max' => 128],
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
            'alias' => 'Alias',
            'name' => 'Name',
            'value' => 'Value',
            'activity_months' => 'Activity Months',
            'weight' => 'Weight',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'created_ip' => 'Created Ip',
            'modified_by' => 'Modified By',
            'modified_at' => 'Modified At',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\ProductPackagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProductPackagesQuery(get_called_class());
    }
}
