<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "products_lang".
 *
 * @property int $id
 * @property int|null $product__id
 * @property string|null $lang
 * @property string|null $name
 * @property string|null $description
 * @property string|null $order_description Описание для заказа
 * @property string|null $brief_text
 * @property string|null $meta_keywords
 * @property string|null $meta_description
 * @property string|null $youtube_iframe
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProductsLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product__id', 'created_by', 'modified_by'], 'integer'],
            [['description', 'order_description', 'brief_text'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['name', 'meta_keywords', 'meta_description'], 'string', 'max' => 255],
            [['youtube_iframe'], 'string', 'max' => 500],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['lang', 'product__id'], 'unique', 'targetAttribute' => ['lang', 'product__id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product__id' => 'Product  ID',
            'lang' => 'Lang',
            'name' => 'Name',
            'description' => 'Description',
            'order_description' => 'Order Description',
            'brief_text' => 'Brief Text',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'youtube_iframe' => 'Youtube Iframe',
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
     * @return \common\models\base\query\ProductsLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProductsLangQuery(get_called_class());
    }
}
