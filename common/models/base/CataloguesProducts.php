<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "catalogues_products".
 *
 * @property int $id
 * @property int|null $catalogues_id
 * @property int|null $products_id
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class CataloguesProducts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catalogues_products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['catalogues_id', 'products_id', 'created_by', 'modified_by'], 'integer'],
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
            'catalogues_id' => 'Catalogues ID',
            'products_id' => 'Products ID',
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
     * @return \common\models\base\query\CataloguesProductsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CataloguesProductsQuery(get_called_class());
    }
}
