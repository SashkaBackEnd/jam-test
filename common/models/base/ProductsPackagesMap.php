<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "products_packages_map".
 *
 * @property int $id
 * @property int|null $products_packages__id
 * @property int|null $products__id
 * @property int|null $count
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProductsPackagesMap extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_packages_map';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['products_packages__id', 'products__id', 'count', 'created_by', 'modified_by'], 'integer'],
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
            'products_packages__id' => 'Products Packages  ID',
            'products__id' => 'Products  ID',
            'count' => 'Count',
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
     * @return \common\models\base\query\ProductsPackagesMapQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProductsPackagesMapQuery(get_called_class());
    }
}
