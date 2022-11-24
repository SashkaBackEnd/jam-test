<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "product_ratios".
 *
 * @property int $id
 * @property int $users__id
 * @property int|null $products__id
 * @property float $ratio
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProductRatios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_ratios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id', 'products__id', 'created_by', 'modified_by'], 'integer'],
            [['ratio'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_ip', 'modified_ip'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'users__id' => 'Users  ID',
            'products__id' => 'Products  ID',
            'ratio' => 'Ratio',
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
     * @return \common\models\base\query\ProductRatiosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProductRatiosQuery(get_called_class());
    }
}
