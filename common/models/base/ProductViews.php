<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "product_views".
 *
 * @property int $id
 * @property int|null $products__id
 * @property int $view_count
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProductViews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_views';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['products__id', 'view_count', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_ip', 'modified_ip'], 'string', 'max' => 255],
            [['products__id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'products__id' => 'Products  ID',
            'view_count' => 'View Count',
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
     * @return \common\models\base\query\ProductViewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProductViewsQuery(get_called_class());
    }
}
